$ = jQuery;

const strip_tags = (input, allowed) => {
    allowed = (((allowed || '') + '')
        .toLowerCase()
        .match(/<[a-z][a-z0-9]*>/g) || [])
        .join('') // making sure the allowed arg is a string containing only tags in lowercase

    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
        commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
    return input.replace(commentsAndPhpTags, '')
        .replace(tags, function ($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
}

// blogname
wp.customize('blogname', value => {
    value.bind( to => {
        $('.site-title > a').html(to);
    });
});

// blogdescription
wp.customize('blogdescription', value => {
    value.bind( to => {
        $('.site-description').html(to);
    });
});

wp.customize( 'sleet_site_copyright', value =>{
    value.bind( to => {
        $('.site-copyright').html(strip_tags(to, '<a>'));
    });
});