@props([
    'title' => 'Laracasts'
])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>107-(laravel)-Form Request Classes : {{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


</head>
<body class="bg-gray-700 p-6 max-w-xl mx-auto">
    <main>
        {{ $slot }}
    </main>
</body>
</html>
