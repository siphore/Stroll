<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="VDiscover">
    <title>VDiscover</title>
    <link rel="manifest" href="/build/manifest.webmanifest">
    @vite('resources/js/app.js')
</head>

<body>
    <div id="app"></div>
</body>

</html>