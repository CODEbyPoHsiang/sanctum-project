<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="UTF-8">
    <title>Sanctum</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
            <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">

</head>
 
<body>
    <div id="app">
       <app></app>
    </div>
</body>
 
</html>