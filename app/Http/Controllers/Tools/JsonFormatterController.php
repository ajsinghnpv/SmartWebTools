<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JsonFormatterController extends Controller
{
       public function index()
    {
        return view('tools.json-formatter');
    }

    public function format(Request $request)
    {
        $raw = $request->input('json_input');
        $decoded = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withInput()->withErrors(['json_input' => 'Invalid JSON: ' . json_last_error_msg()]);
        }

        $formatted = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return view('tools.json-formatter', compact('raw', 'formatted'));
    }
}