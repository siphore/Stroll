const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .css("resources/css/filters.css", "public/css")
    .setPublicPath("public");
