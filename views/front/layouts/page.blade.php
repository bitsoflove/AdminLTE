<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('title')

    <link media="all" type="text/css" rel="stylesheet" href="/themes/diekeure/styles/sites/{{ \Modules\Site\Facades\Site::current()->slug }}/screen.css">
</head>
<body>


    {{-- The purpose for this layout is to serve the BACKEND error views in project/app/resources/views/errors --}}


    @yield('title')
    @yield('content')

</body>
</html>