
    @include('layouts.header')
    {{-- Main content --}}
    <main class="flex-grow">
        @yield('content')
    </main>
    @include('layouts.footer')
