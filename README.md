# Sleet Theme: Wordpress Theme Boilerplate

===

Hi. I'm a starter theme called `sleet`, just because I hate winter's sleet and slush.
I'm a theme meant for begining theme development from scratch. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

-   A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
-   A just right amount of lean, well-commented, modern, HTML5 templates.
-   A custom header implementation in `template-parts/header` folder. Just include files to your `header.php` template.
-   A custom footer implementation in `template-parts/footer` folder. Just include files to your `footer.php` template.
-   Some small tweaks in `includes/template-functions.php` that can improve your theming experience.
-   Smartly organized starter SCSS/JS in `assets/scss` and `assets/js` folder that will help you to quickly get your design off the ground.
-   Custom hooks in all WP templates files.
-   Licensed under GPLv2 or later. :) Use it to make something cool.

## Installation

### Requirements

`sleet` requires the following dependencies:

-   [Node.js](https://nodejs.org/)
-   [Gulp JS](https://gulpjs.com/)

### Quick Start

Clone or download this repository into your Wordpress Themes folder.

### Setup

To start using all the tools that come with `sleet` you need to install the necessary Node.js :

-   `$ npm install` - installation of all dev dependencies into the folder you are executing this command at the moment.
-   Create babel config file. The dot before the name of file is must have.
-   `$ .babelrc` paste into it the following object and save the file.
-   `{ "presets": ["@babel/env"] }`

### Available CLI commands

`sleet` comes packed with CLI commands tailored for WordPress theme development :

-   `npm run dev` : starts a development mode to watch all changes via browsersync.
-   `npm run build` : bundles all assets without watching changes.
-   `npm run bundle` : generates a .zip archive for distribution, `see zipped folder`, excluding development and system/ide files; use it for production mode only.

### Configure local server

`sleet` theme uses the browser sync to reload instantly the pages in browser, so all you need to do in here
is to replace within -`gulpfile.babel.js` on line 45 the proxy url with yours.

### Must have plugins

`sleet` theme needs **Advanced Custom Fields Pro** or free version.

### Project sample

You may download a WordPress [copy from here](https://bit.ly/37XmJ9I). Throw these files into your domain directory and access http(s)://domain.example/installer.php and follow the steps from the installation wizard

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
