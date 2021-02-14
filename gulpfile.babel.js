import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpackStream from 'webpack-stream';
import uglify from 'gulp-uglify';
import vinylNamed from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';


const PRODUCTION = yargs.argv.prod;
const server = browserSync.create();

const paths = {
    styles: {
        src: ['assets/scss/*.scss'],
        dest: 'dist/assets/css'
    },
    scripts: {
        src: ['assets/js/sleet-scripts.js', 'assets/js/sleet-jq-main.js'],
        dest: 'dist/assets/js'
    },
    images: {
        src: 'assets/images/**/*.{jpg,jpeg,png,svg,gif,webp}',
        dest: 'dist/assets/images'
    },
    other: {
        src: ['assets/**/*', '!assets/{images,js,scss,admin,css}', '!assets/{images,js,scss,admin,css}/**/*'],
        dest: 'dist/assets'
    },
    package: {
        src: ['**/*', '!.vscode', '!node_modules{,/**}', '!zipped{,/**}', '!src{,**}', '!.gitignore', '!package-lock.json', '!.idea'],
        dest: 'zipped'
    }
}

// browser sync server
export const serve = (done) => {
    server.init({
        proxy: 'http://underscore.local/'
    });
    done();
}

export const reload = (done) => {
    server.reload();
    done();
}

// clean task
export const clean = () => del(['dist']);

// style task
export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(server.stream());
}

// images task
export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(gulpif(PRODUCTION,
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.mozjpeg({ quality: 75, progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [
                        { removeViewBox: true },
                        { cleanupIDs: false }
                    ]
                })
            ]))
        )
        .pipe(gulp.dest(paths.images.dest));
}

// JS scripts task
export const scripts = (done) => {
    return gulp.src(paths.scripts.src)
        .pipe(vinylNamed())
        .pipe(webpackStream({
            mode: !PRODUCTION ? "development" : "production",
            output: {
                filename: '[name].min.js'
            },
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        exclude: /node_modules/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/env']
                            }
                        }
                    }
                ]
            },
            externals: {
                jquery: 'jQuery'
            },
            devtool: !PRODUCTION ? 'inline-source-map': false
        }))
        .pipe(gulpif(PRODUCTION, uglify()))
        .pipe(gulp.dest(paths.scripts.dest));
        done();
}

// copy task
export const copy = () => {
    return gulp.src(paths.other.src)
        .pipe(gulp.dest(paths.other.dest));
}

// watch tasks for changes
export const watch = () => {
    gulp.watch('assets/scss/**/*.scss', styles);
    gulp.watch('assets/js/**/*.js', gulp.series(scripts, reload));
    gulp.watch('**/*.php', reload);
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch(paths.other.src, gulp.series(copy, reload));
}

// prepare zip archive task
export const compress = () => {
    return gulp.src(paths.package.src)
        .pipe(zip('sleet.zip'))
        .pipe(gulp.dest(paths.package.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
export const bundle = gulp.series(build, compress);

export default dev;