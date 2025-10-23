<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boutique</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navigation/>
    <x-fil-ariane/>
    <x-hero-section/>
    <x-categories :categories="$categories"/>
    <div class="mx-auto flex justify-center">
        @yield('content')
    </div>
</body>

</html>
