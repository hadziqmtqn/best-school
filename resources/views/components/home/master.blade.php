<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ $application['name'] }}</title>

    <x-home.head/>
    @stack('styles')

    <style>
        :root {
            @foreach($application['themeColors'] as $variable => $value)
                {{ $variable }}: {{ $value }};
            @endforeach
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

@stack('scripts')
</body>

</html>
