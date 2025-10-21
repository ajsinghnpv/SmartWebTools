@extends('layouts.app')

@section('title', 'Network Information - IP Address Lookup')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Main Card -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-indigo-500/20">
            <!-- Header -->
            <div class="px-8 py-6 border-b border-white/10">
                <div class="flex items-center justify-center">
                    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 p-3 rounded-xl shadow-md">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.11 1.157-4.418" />
                        </svg>
                    </div>
                    <h1 class="ml-4 text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-indigo-200">
                        Network Information
                    </h1>
                </div>
            </div>

            <!-- Main Content -->
            <div class="px-8 py-8">
                <!-- IP Address Section -->
                <div class="mb-10 text-center">
                    <h2 class="text-sm font-semibold text-indigo-300 uppercase tracking-wider mb-3">Your Public IP Address</h2>
                    <div class="flex items-center justify-center">
                        <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-xl px-6 py-4 inline-flex items-center">
                            <span class="text-2xl sm:text-3xl font-mono font-bold text-white tracking-wide">{{ $ip }}</span>
                            <button onclick="copyToClipboard('{{ $ip }}')" class="ml-4 p-2 bg-white/10 hover:bg-white/20 rounded-lg transition-all duration-200" title="Copy to clipboard">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Additional Network Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- User Agent -->
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-5">
                        <h3 class="text-sm font-medium text-indigo-300 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            User Agent
                        </h3>
                        <p class="text-sm text-gray-200 font-mono break-all mt-3">{{ $userAgent }}</p>
                    </div>

                    <!-- Location (if available) -->
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-5">
                        <h3 class="text-sm font-medium text-indigo-300 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Approximate Location
                        </h3>
                        @if(isset($location) && $location)
                            <p class="text-sm text-white mt-3">{{ $location['city'] ?? 'Unknown' }}, {{ $location['region'] ?? '' }} {{ $location['country'] ?? '' }}</p>
                            <p class="text-xs text-gray-300 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                                </svg>
                                ISP: {{ $location['isp'] ?? 'Unknown' }}
                            </p>
                        @else
                            <p class="text-sm text-gray-300 mt-3">Location data not available</p>
                        @endif
                    </div>
                </div>

                <!-- Technical Details -->
                <div class="mt-10">
                    <h3 class="text-lg font-semibold text-white mb-5 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Technical Details
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-sm border-b border-white/10 pb-3">
                            <span class="text-gray-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622z" />
                                </svg>
                                Protocol
                            </span>
                            <span class="font-mono text-white bg-white/10 px-3 py-1 rounded-lg">{{ request()->secure() ? 'HTTPS' : 'HTTP' }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm border-b border-white/10 pb-3">
                            <span class="text-gray-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                </svg>
                                Request Method
                            </span>
                            <span class="font-mono text-white bg-white/10 px-3 py-1 rounded-lg">{{ request()->method() }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm border-b border-white/10 pb-3">
                            <span class="text-gray-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                </svg>
                                Server Port
                            </span>
                            <span class="font-mono text-white bg-white/10 px-3 py-1 rounded-lg">{{ request()->getPort() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer with action buttons -->
            <div class="px-8 py-5 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center bg-white/5">
                <p class="text-xs text-gray-300 mb-3 sm:mb-0 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Your IP information is not stored
                </p>
                <div class="flex space-x-3">
                    <button onclick="window.location.reload()" class="px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-sm font-medium text-white transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Refresh
                    </button>
                    <a href="{{ url('/') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 rounded-lg shadow-md text-sm font-medium text-white transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        More Tools
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Info Card -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-lg mt-8 p-7 transition-all duration-300 hover:shadow-indigo-500/20">
            <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About IP Addresses
            </h3>
            <p class="text-sm text-gray-300 mb-5">
                An IP (Internet Protocol) address is a unique numerical identifier assigned to each device connected to a computer network. 
                It serves two primary functions: host or network interface identification and location addressing.
            </p>
            <div class="bg-indigo-900/30 border-l-4 border-indigo-400 p-4 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-indigo-100">
                            For enhanced privacy and security, consider using a VPN service to mask your real IP address 
                            and encrypt your internet connection.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        // Create and show a toast notification
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-lg text-sm flex items-center animate-fade-in';
        toast.innerHTML = `
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Copied to clipboard!
        `;
        document.body.appendChild(toast);
        
        // Remove toast after 3 seconds
        setTimeout(() => {
            toast.classList.add('animate-fade-out');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }).catch(err => {
        console.error('Failed to copy text: ', err);
    });
}
</script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeOut {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(10px); }
}
.animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
}
.animate-fade-out {
    animation: fadeOut 0.3s ease-in forwards;
}
</style>
@endsection