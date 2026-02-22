<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ $application['name'] }}</title>

    <x-home.head/>
    <style>
        :root {
            --primary-color: #0d47a1;
            --primary-light: #1976d2;
            --accent-color: #ffca28;
            --text-dark: #333333;
            --text-light: #666666;
            --bg-light: #f8f9fa;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<x-home.navigation/>

{{ $slot }}

<x-sections.cta/>

<!-- Footer -->
<x-home.footer/>

<x-home.scripts/>
</body>

</html>
