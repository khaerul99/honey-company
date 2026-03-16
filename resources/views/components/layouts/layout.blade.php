<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @if(isset($setting) && $setting->logo)
        <link rel="icon" type="image/png" href="{{ $setting->logo }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif

    <title>{{ $setting->site_name ?? 'Honey Mood' }} - Madu Murni Berkualitas</title>

    <meta name="description" content="{{ $setting->seo_description }}">
    <meta name="keywords" content="{{ $setting->seo_keywords }}">

    {{-- tampilan pas di-share ke WA/Sosmed--}}
    <meta property="og:title" content="{{ $setting->seo_title ?? $setting->site_name }}">
    <meta property="og:description" content="{{ $setting->seo_description }}">
    <meta property="og:image" content="{{ asset($setting->logo) }}">
    <meta property="og:type" content="website">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white antialiased">

    <x-navbar.navbar :setting="$setting" />

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-sticky.sosmed :sosmeds="$sosmeds" />
    <x-footer :setting="$setting" />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000, 
        once: true,    
        offset: 100,    
    });
    </script>


</body>
</html>