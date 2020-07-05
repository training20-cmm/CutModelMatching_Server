<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("css/app.css")}}">
        @yield("links")
    </head>
    <body>
        <v-app id="app" class="h-100">
            @yield("app-content")
        </v-app>
        <script src="{{asset("js/app.js")}}"></script>
    </body>
</html>
