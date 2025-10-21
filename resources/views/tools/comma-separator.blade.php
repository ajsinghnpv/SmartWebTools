@extends('layouts.app')

@section('title', 'Free Comma Separating Tool')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-12 px-4">
    <div class="max-w-5xl mx-auto rounded-2xl shadow-xl p-10">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-100 mb-2">Free Comma Separating Tool</h1>
            <p class="text-gray-200 text-sm">Paste your list below (one per line) and convert it into a comma-delimited string. Choose other delimiters too!</p>
        </div>

        <form method="POST" action="{{ route('tools.comma-separator') }}" class="grid md:grid-cols-2 gap-6">
            @csrf

            {{-- Left: Raw Input --}}
            <div>
                <label class="block text-sm font-medium text-gray-100 mb-2">Paste Data:</label>
                <textarea name="raw_input" rows="12" class="w-full text-white p-4 text-sm font-mono border rounded-lg shadow-sm focus:ring-blue-500 focus:outline-none" placeholder="ZIP1001&#10;ZIP1002&#10;ZIP1003">{{ old('raw_input', $input ?? '') }}</textarea>
            </div>

            {{-- Right: Output --}}
            <div>
                <label class="block text-sm font-medium text-gray-200 mb-2">Delimited Output:</label>
                <textarea readonly rows="12" class="w-full p-4 text-sm font-mono border text-white border-gray-100 rounded-lg shadow-sm focus:outline-none">{{ $output ?? '' }}</textarea>
            </div>

            {{-- Bottom: Controls --}}
            <div class="md:col-span-2 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-4">
                <div class="flex gap-4 items-center">
                    <label for="delimiter" class="text-sm font-medium text-gray-100">Choose Delimiter:</label>
                    <select name="delimiter" id="delimiter" class="border border-white rounded px-3 py-2 text-sm focus:ring focus:ring-white">
                        <option value="" >Please Select</option>
                        <option value="," {{ ($delimiter ?? '') == ',' ? 'selected' : '' }}>Comma (,)</option>
                        <option value=";" {{ ($delimiter ?? '') == ';' ? 'selected' : '' }}>Semicolon (;)</option>
                        <option value="|" {{ ($delimiter ?? '') == '|' ? 'selected' : '' }}>Pipe (|)</option>
                        <option value=" " {{ ($delimiter ?? '') == ' ' ? 'selected' : '' }}>Space</option>
                        <option value="\n" {{ ($delimiter ?? '') == '\n' ? 'selected' : '' }}>Line Break</option>
                    </select>
                </div>

                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg shadow hover:bg-purple-700 transition">
                    Convert
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
