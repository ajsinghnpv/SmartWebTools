@extends('layouts.app')

@section('title', 'JSON Formatter')

@section('content')
<div class="min-h-screen bg-gradient-to-br  py-12 px-4">
    <div class="max-w-4xl mx-auto rounded-2xl shadow-2xl p-10">
        <div class="mb-8 border-b pb-4">
            <h1 class="text-3xl font-extrabold text-gray-100 flex items-center gap-2">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h16"></path>
                </svg>
                JSON Formatter
            </h1>
            <p class="text-gray-200 mt-1 text-sm">Easily beautify or validates your's raw JSON data.</p>
        </div>

        <form method="POST" action="{{ url('/json-formatter') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-100">Paste your JSON:</label>
                <textarea name="json_input" rows="10" class="w-full font-mono text-sm p-4 border text-white border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-800 focus:outline-none resize-none" placeholder='{"name": "RAM"}'>{{ old('json_input', $raw ?? '') }}</textarea>

                @error('json_input')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-purple-500 text-white text-sm font-semibold rounded-lg shadow hover:bg-purple-700 transition">
                    Format JSON
                </button>
            </div>
        </form>

        @if (!empty($formatted))
            <div class="mt-10">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Formatted Output:</h2>
                <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 overflow-auto max-h-[400px]">
                    <pre class="text-sm text-gray-800 font-mono whitespace-pre-wrap">{{ $formatted }}</pre>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
