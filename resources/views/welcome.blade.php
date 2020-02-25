<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <script>window.laravel = {csrfToken: '{{csrf_token()}}'}</script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div id="app">

            <v-container fluid>
                {{--<header-component></header-component>--}}
                {{--<footer-component></footer-component>--}}
                <router-view></router-view>
            </v-container>

        </div>

        @yield('content')
        <script src="{{ mix('js/app.js')}}" ></script>
    </body>
</html>
