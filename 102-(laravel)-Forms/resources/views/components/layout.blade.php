@props([
    'title' => 'Laracasts'
])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>102-(laravel)-Forms : {{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-700 p-6 max-w-xl mx-auto">
    <main>
        {{ $slot }}
    </main>
</body>
</html>
