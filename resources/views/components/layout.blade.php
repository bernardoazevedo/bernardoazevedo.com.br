<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="bg-white">
        <div class="px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-200 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                        Icon when menu is closed.
            
                        Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                        Icon when menu is open.
            
                        Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-center">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        {{-- <a href="/" class="bg-gray-300 px-3 py-2 text-sm font-medium rounded-md text-gray-800" aria-current="page">Home</a>
                        <a href="/about-me" class=" px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-200 hover:text-gray-800">About me</a>
                        <a href="/content" class=" px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-200 hover:text-gray-800">Content</a> --}}
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/about-me" :active="request()->is('about-me')">About me</x-nav-link>
                        <x-nav-link href="/content" :active="request()->is('content')">Content</x-nav-link>
                    </div>
                </div>
            </div>

        </div>
      
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-300 text-gray-800", Default: "text-gray-600 hover:bg-gray-200 hover:text-gray-800" -->
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/about-me" :active="request()->is('about-me')">About me</x-nav-link>
                <x-nav-link href="/content" :active="request()->is('content')">Content</x-nav-link>
            </div>
        </div>
    </nav>

    {{ $slot }}
</body>
</html>