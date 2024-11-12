<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'AgroMart - Toko Bibit & Pupuk Terpercaya')</title>
    @notifyCss
    @vite([
       'resources/css/app.css',
       'resources/js/app.js',
       'resources/js/deleteConfirmation.js'
   ])
</head>
<body>
<div>
    @yield('app-content')
    <x-notify::notify/>
    @notifyJs
</div>
@stack('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
