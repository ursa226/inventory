<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <!-- Include Bootstrap CSS from a CDN -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
<!-- Include Bootstrap JavaScript from a CDN -->

    

    <!-- Add any other stylesheets, scripts, or meta tags you need here -->
</head>
<body>
    <main class="py-4">
        
        @yield('content')
        
    </main>

    


    <!-- Add any other scripts you need here -->
</body>
</html>
