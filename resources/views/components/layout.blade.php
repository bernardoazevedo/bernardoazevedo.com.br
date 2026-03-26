<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" >
    <link rel="icon" href="{{ url('assets/css/favicon.ico') }}">
</head>
<body>
    <div class="desktop">
        {{-- Menu Bar --}}
        <ul role="menu-bar" class="menu-bar-main">
            <li role="menu-item" class="apple-menu" tabindex="0" aria-haspopup="true">
                <span class="apple-icon">&#63743;</span>
                <ul role="menu">
                    <li role="menu-item"><a href="mailto:bernardoazevedo.8@gmail.com">E-mail</a></li>
                    <li role="menu-item"><a href="https://www.linkedin.com/in/bernardo-azevedo-49a008226" target="_blank">LinkedIn</a></li>
                    <li role="menu-item"><a href="https://github.com/bernardoazevedo" target="_blank">GitHub</a></li>
                </ul>
            </li>
            <li role="menu-item"><a href="/">Home</a></li>
            <li role="menu-item"><a href="/content">Content</a></li>
            <li role="menu-item" class="menu-search-container" tabindex="0">
                <x-search-bar></x-search-bar>
            </li>
        </ul>

        {{-- Main Window --}}
        <div class="window main-window">
            <div class="title-bar">
                <button aria-label="Close" class="close"></button>
                <h1 class="title">{{ $title }}</h1>
                <button aria-label="Resize" class="resize"></button>
            </div>
            <div class="separator"></div>
            <div class="window-pane main-pane">
                {{ $slot }}
            </div>
        </div>

        {{-- Footer --}}
        <div class="standard-dialog footer-dialog">
            <p class="dialog-text">&copy; {{ date('Y') }} - Bernardo Azevedo Costa</p>
        </div>
    </div>

    <script src="{{ url('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('assets/js/script.js') }}"></script>
</body>
</html>
