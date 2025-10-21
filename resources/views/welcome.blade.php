@extends('layouts.app')

@section('title', 'Premium Online Utility Toolkit')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-3xl shadow-2xl p-12 text-white max-w-4xl mx-auto transform transition-all hover:scale-[1.01] duration-300">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 rounded-3xl opacity-70"></div>
            <div class="relative z-10">
                <h1 class="text-5xl md:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-indigo-200 leading-tight">
                    Elevate Your Workflow
                </h1>
                <p class="mt-6 text-xl text-white/90 font-light max-w-2xl mx-auto">
                    Premium online tools designed for professionals. Streamline your tasks with our elegant, privacy-focused utilities.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row justify-center gap-6">
                    <a href="#" class="relative overflow-hidden group bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium px-8 py-4 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all duration-300">
                        <span class="relative z-10">Explore Tools</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="#" class="relative overflow-hidden group bg-transparent border-2 border-white/30 text-white font-medium px-8 py-3.5 rounded-xl hover:border-white/50 transition-all duration-300">
                        <span class="relative z-10">How It Works</span>
                        <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Tools -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-white sm:text-4xl">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-indigo-200">Featured Tools</span>
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-white/80 font-light">
                Curated selection of our most powerful utilities
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @php
                $tools = [
                    ['title' => "IP Address Lookup", 'desc' => 'Discover your public IP address with detailed network information', 'route' => route('tools.my-ip'), 'icon' => 'globe'],
                    ['title' => 'Network Speed Test', 'desc' => 'Comprehensive analysis of your internet connection performance', 'route' => route('tools.speed-test'), 'icon' => 'lightning'],
                    ['title' => 'QR Code Generator', 'desc' => 'Create professional QR codes with customizable designs', 'route' => '/qr-generator', 'icon' => 'qr-code'],
                    ['title' => 'JSON Formatter', 'desc' => 'Beautify, validate, and convert JSON data with advanced options', 'route' => route('tools.json-formatter'), 'icon' => 'code'],
                    ['title' => 'Text Utilities', 'desc' => 'Advanced text manipulation including case conversion and analysis', 'route' => route('tools.comma-separator'), 'icon' => 'text'],
                    ['title' => 'Password Generator', 'desc' => 'Create cryptographically strong passwords with custom rules', 'route' => '/password-generator', 'icon' => 'lock'],
                ];
            @endphp

            @foreach ($tools as $tool)
            <div class="group relative">
                <div class="absolute -inset-1 rounded-2xl bg-gradient-to-br from-indigo-500/30 to-purple-500/30 opacity-0 group-hover:opacity-100 blur-lg transition-all duration-300"></div>
                <div class="relative h-full bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-lg hover:shadow-indigo-500/20 hover:border-white/20 transition-all duration-300 p-6 overflow-hidden">
                    <div class="absolute top-4 right-4">
                        <div class="bg-white/10 p-2 rounded-lg backdrop-blur-sm">
                            @switch($tool['icon'])
                                @case('globe')
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @break
                                @case('lightning')
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    @break
                                @case('qr-code')
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                    </svg>
                                    @break
                                @case('code')
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                    @break
                                @case('text')
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    @break
                                @case('lock')
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold text-white group-hover:text-indigo-200 transition-colors duration-300">
                            <a href="{{ $tool['route'] }}" class="focus:outline-none">
                                {{ $tool['title'] }}
                            </a>
                        </h3>
                        <p class="mt-2 text-white/80 font-light">{{ $tool['desc'] }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ $tool['route'] }}" class="inline-flex items-center text-sm font-medium text-indigo-300 group-hover:text-white transition-colors duration-300">
                            Access Tool
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-16 text-center">
            <a href="/tools" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Discover All Utilities
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-20 bg-gradient-to-b from-white/5 to-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base font-semibold tracking-wider text-indigo-300 uppercase">Features</h2>
                <p class="mt-2 text-3xl leading-8 font-bold text-white sm:text-4xl">
                    Professional-Grade Toolset
                </p>
                <p class="mt-4 max-w-2xl text-xl text-white/80 font-light lg:mx-auto">
                    Designed with professionals in mind, our tools deliver exceptional quality and performance.
                </p>
            </div>

            <div class="mt-16">
                <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-white">Premium Quality</h3>
                        <p class="mt-2 text-base text-white/80 font-light">
                            Enterprise-grade tools with professional features and outputs.
                        </p>
                    </div>

                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-white">Zero Data Retention</h3>
                        <p class="mt-2 text-base text-white/80 font-light">
                            All processing happens client-side. Your data never touches our servers.
                        </p>
                    </div>

                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-white">Cloud Platform</h3>
                        <p class="mt-2 text-base text-white/80 font-light">
                            Access from any device, anywhere. No installations required.
                        </p>
                    </div>

                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-6 hover:border-white/20 transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-white">Lightning Fast</h3>
                        <p class="mt-2 text-base text-white/80 font-light">
                            Optimized algorithms deliver results instantly, even for complex tasks.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-16">
                <h2 class="text-base font-semibold tracking-wider text-indigo-300 uppercase">Testimonials</h2>
                <p class="mt-2 text-3xl leading-8 font-bold text-white sm:text-4xl">
                    Trusted by Professionals
                </p>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-8 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center mb-4 text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="text-lg text-white font-light mb-6">
                        "The JSON formatter has become an indispensable tool in my development workflow. The clean interface and powerful features save me hours every week."
                    </p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">JD</div>
                        <div class="ml-4">
                            <h4 class="text-white font-medium">James Donovan</h4>
                            <p class="text-indigo-200 text-sm">Senior Developer, TechCorp</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-8 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center mb-4 text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="text-lg text-white font-light mb-6">
                        "As a digital marketer, I rely on the QR generator daily. The professional output options make my campaigns look polished and premium."
                    </p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">SM</div>
                        <div class="ml-4">
                            <h4 class="text-white font-medium">Sarah Mitchell</h4>
                            <p class="text-indigo-200 text-sm">Marketing Director, BrandCo</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-8 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center mb-4 text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="text-lg text-white font-light mb-6">
                        "The password generator's advanced options help me maintain enterprise security standards while keeping usability simple for our team."
                    </p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">RT</div>
                        <div class="ml-4">
                            <h4 class="text-white font-medium">Robert Taylor</h4>
                            <p class="text-indigo-200 text-sm">IT Security Lead, FinSecure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-purple-600/10 opacity-40"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-3xl shadow-2xl p-12 transform transition-all hover:scale-[1.01] duration-500">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to Transform Your Workflow?
                </h2>
                <p class="text-xl text-white/90 font-light max-w-2xl mx-auto mb-10">
                    Join thousands of professionals who trust our premium tools for their daily tasks.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="/tools" class="relative overflow-hidden group bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium px-8 py-4 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all duration-300">
                        <span class="relative z-10">Get Started Now</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="#" class="relative overflow-hidden group bg-transparent border-2 border-white/30 text-white font-medium px-8 py-3.5 rounded-xl hover:border-white/50 transition-all duration-300">
                        <span class="relative z-10">Learn More</span>
                        <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection