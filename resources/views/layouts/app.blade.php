<!DOCTYPE html>

<html class = "no-focus" lang = "en">


<head>
    {{-- Title and Meta --}}
    <title>Assignement3</title>
    
    <meta charset = "utf-8">
    <meta name = "robots" content = "noindex, nofollow">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name = "csrf-token" content = "{{ csrf_token() }}">
    {{-- END Title and Meta --}}
    
    {{-- Icons --}}
    <link rel = "icon" href = "/favicon.ico">
    {{-- END Icons --}}
    
    {{-- Stylesheets --}}
    {{-- Web fonts --}}
    <link rel = "stylesheet"
          href = "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"
    >
    
    <link href = "{{ asset('css/app.css') }}" rel = "stylesheet">
    {{-- END Stylesheets --}}

</head>

<body>
    <div id = "app">
    </div>
    <script src = "{{ asset('js/app.js') }}"></script>
</body>
</html>
