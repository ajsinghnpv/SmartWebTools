@extends('layouts.app')

@section('title', 'Internet Speed Test')

@section('content')
<div class="min-h-screen bg-gradient-to-br text-white flex items-center justify-center p-6">
    <div class="w-full max-w-xl rounded-3xl shadow-2xl p-8 text-center border border-gray-700">
        <h1 class="text-4xl font-bold mb-3">🌐 Internet Speed Test</h1>
        <p class="text-gray-200 mb-8 text-sm">Check your real-time download, upload, and ping speed</p>

        <div class="relative w-44 h-44 mx-auto mb-6 animate-pulse" id="speedContainer">
            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="45" stroke="#2d3748" stroke-width="10" fill="none" />
                <circle id="speedArc" cx="50" cy="50" r="45" stroke="#22c55e" stroke-width="10" fill="none"
                    stroke-dasharray="282.6" stroke-dashoffset="282.6" stroke-linecap="round" />
            </svg>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
                <span id="mainSpeed" class="text-3xl font-semibold">0</span>
                <span class="text-sm text-gray-200">Mbps</span>
            </div>
        </div>

        <button id="startBtn" class="bg-purple-500 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition-all shadow-md disabled:opacity-50">
            🚀 Start Test
        </button>

        <div id="loadingText" class="mt-4 text-gray-100 text-sm hidden">Running speed test...</div>

        <div id="results" class="mt-10 space-y-4 hidden">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-300">
                <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:shadow-green-500/30 transition">
                    <p class="text-gray-400">⬇ Download</p>
                    <p class="text-2xl font-bold text-green-400" id="downloadSpeed">--</p>
                    <p class="text-sm">Mbps</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:shadow-yellow-500/30 transition">
                    <p class="text-gray-400">⬆ Upload</p>
                    <p class="text-2xl font-bold text-yellow-300" id="uploadSpeed">--</p>
                    <p class="text-sm">Mbps</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:shadow-pink-500/30 transition">
                    <p class="text-gray-400">📶 Ping</p>
                    <p class="text-2xl font-bold text-pink-400" id="ping">--</p>
                    <p class="text-sm">ms</p>
                </div>
            </div>

            <p class="text-xs text-gray-100 mt-2">🕒 Test conducted at <span id="timestamp"></span></p>
        </div>
    </div>
</div>

<script>
    const mainSpeedEl = document.getElementById('mainSpeed');
    const startBtn = document.getElementById('startBtn');
    const resultsDiv = document.getElementById('results');
    const loadingText = document.getElementById('loadingText');

    startBtn.addEventListener('click', async () => {
        startBtn.disabled = true;
        loadingText.classList.remove('hidden');
        resultsDiv.classList.add('hidden');
        mainSpeedEl.textContent = "0";
        animateSpeed(0);

        try {
            // Ping Test
            const pingStart = performance.now();
            await fetch('/ping.txt', { method: 'HEAD', cache: 'no-cache' });
            const pingEnd = performance.now();
            const ping = Math.round(pingEnd - pingStart);
            document.getElementById('ping').textContent = ping;

            // Download Speed
            const imageUrl = "https://upload.wikimedia.org/wikipedia/commons/3/3f/Fronalpstock_big.jpg";
            const downloadStart = performance.now();
            const response = await fetch(imageUrl, { cache: "no-store" });
            const blob = await response.blob();
            const downloadEnd = performance.now();

            const fileSizeBytes = response.headers.get("content-length") || blob.size;
            const downloadTime = (downloadEnd - downloadStart) / 1000;
            const downloadSpeed = ((fileSizeBytes * 8) / (downloadTime * 1024 * 1024)).toFixed(2);
            document.getElementById('downloadSpeed').textContent = downloadSpeed;
            animateSpeed(parseFloat(downloadSpeed));

            // Upload Speed
            const uploadStart = performance.now();
            await fetch("/upload-test", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: blob,
            });
            const uploadEnd = performance.now();
            const uploadTime = (uploadEnd - uploadStart) / 1000;
            const uploadSpeed = ((blob.size * 8) / (uploadTime * 1024 * 1024)).toFixed(2);
            document.getElementById('uploadSpeed').textContent = uploadSpeed;

            // Save result
            await fetch("/save-speed-test", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    download: parseFloat(downloadSpeed),
                    upload: parseFloat(uploadSpeed),
                    ping: ping
                }),
            });

            // Show results
            const now = new Date();
            document.getElementById('timestamp').textContent = now.toLocaleString();
            resultsDiv.classList.remove('hidden');
        } catch (error) {
            alert("Something went wrong while testing your speed. Please try again.");
            console.error(error);
        }

        loadingText.classList.add('hidden');
        startBtn.disabled = false;
    });

    function animateSpeed(targetSpeed) {
        let current = 0;
        const increment = targetSpeed / 50;
        const arc = document.getElementById('speedArc');
        const maxDash = 282.6;

        const interval = setInterval(() => {
            current += increment;
            if (current >= targetSpeed) {
                current = targetSpeed;
                clearInterval(interval);
            }

            const percent = Math.min(current / 100, 1);
            arc.style.strokeDashoffset = maxDash - maxDash * percent;
            mainSpeedEl.textContent = current.toFixed(1);
        }, 30);
    }
</script>
@endsection
