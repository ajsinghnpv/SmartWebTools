<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Premium Utility Toolkit')</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 min-h-screen flex flex-col">
    <!-- Premium Navigation -->
    <nav class="bg-white/5 backdrop-blur-xl border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 p-2 rounded-lg shadow-md">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-indigo-200">Bheeem</span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all duration-300 flex items-center {{ request()->is('/') ? 'bg-white/10 shadow-inner' : '' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                    {{-- <a href="{{ route('tools.my-ip') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all duration-300 flex items-center {{ request()->routeIs('tools.my-ip') ? 'bg-white/10 shadow-inner' : '' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                        Network Tools
                    </a>
                    <a href="{{ route('tools.json-formatter') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all duration-300 flex items-center {{ request()->routeIs('tools.json-formatter') ? 'bg-white/10 shadow-inner' : '' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Developer
                    </a> --}}
                    <a href="{{ route('tools.comma-separator') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all duration-300 flex items-center {{ request()->routeIs('tools.comma-separator') ? 'bg-white/10 shadow-inner' : '' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Text Tools
                    </a>
                    {{-- <div class="relative group">
                        <button class="px-4 py-2.5 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            More
                        </button>
                        <div class="absolute right-0 mt-2 w-56 origin-top-right bg-white/10 backdrop-blur-2xl border border-white/10 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-1">
                                <a href="{{ route('tools.speed-test') }}" class="block px-4 py-3 text-sm text-white hover:bg-white/20 transition flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    Speed Test
                                </a>
                                <a href="#" class="block px-4 py-3 text-sm text-white hover:bg-white/20 transition flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    QR Generator
                                </a>
                                <a href="#" class="block px-4 py-3 text-sm text-white hover:bg-white/20 transition flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Password Generator
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white/5 backdrop-blur-lg border-t border-white/10">
                <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-white/10 transition {{ request()->is('/') ? 'bg-white/10' : '' }}">Home</a>
                <a href="{{ route('tools.my-ip') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-white/10 transition {{ request()->routeIs('tools.my-ip') ? 'bg-white/10' : '' }}">What is My IP</a>
                <a href="{{ route('tools.json-formatter') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-white/10 transition {{ request()->routeIs('tools.json-formatter') ? 'bg-white/10' : '' }}">JSON Formatter</a>
                <a href="{{ route('tools.comma-separator') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-white/10 transition {{ request()->routeIs('tools.comma-separator') ? 'bg-white/10' : '' }}">Comma Separator</a>
                <a href="{{ route('tools.speed-test') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-white/10 transition {{ request()->routeIs('tools.speed-test') ? 'bg-white/10' : '' }}">Speed Test</a>
            </div>
        </div>
    </nav>

