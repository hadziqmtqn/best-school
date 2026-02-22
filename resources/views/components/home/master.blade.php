<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ $application['name'] }}</title>

    <x-home.head/>
    <style>
        :root {
            /* Default: Hijau */
            --primary-color: #0d47a1;
            --primary-color-rgb: 27, 125, 74;
            /* RGB values for rgba() usage */
            --primary-light: #1976d2;
            --accent-color: #ffca28;
            /* Emas/Kuning */
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

<x-home.cta/>

<!-- Footer -->
<x-home.footer/>

<x-home.scripts/>
</body>

</html>
