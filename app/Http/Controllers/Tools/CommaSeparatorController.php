<?php 

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;

class CommaSeparatorController
{
    public function index()
    {
        return view('tools.comma-separator');
    }

    public function process(Request $request)
    {
        $input = $request->input('raw_input');
        $delimiter = $request->input('delimiter', ',');

        // Split input by new lines and remove empty entries
        $lines = array_filter(array_map('trim', explode(PHP_EOL, $input)));

        // Implode with chosen delimiter
        $output = implode($delimiter . ' ', $lines);

        return view('tools.comma-separator', compact('input', 'output', 'delimiter'));
    }
}