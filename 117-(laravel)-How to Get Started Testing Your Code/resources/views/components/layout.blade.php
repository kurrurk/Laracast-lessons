@props([
    'title' => 'Laracasts'
])
<!DOCTYPE html>
<html lang="en" {{-- data-theme="dracula" --}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>117-(laravel)-How to Get Started Testing Your Code : {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    <x-nav />
    <main class="max-w-3xl mx-auto mt-6">
        {{ $slot }}
    </main>
</body>
</html>
