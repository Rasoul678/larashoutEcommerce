<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    </head>
    <body >
        @include('admin.partials.header')
        <div class="row">
            <div class="col s12 m3">
                @include('admin.partials.sidebar')
            </div>
            <div class="col s12 m8">
                @yield('content')
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
