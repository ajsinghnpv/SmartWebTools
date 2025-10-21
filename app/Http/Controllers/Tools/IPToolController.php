<?php 

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;

class IPToolController
{
    public function show(Request $request)
    {
        return view('tools.my-ip', [
            'ip' => $request->ip(),
            'userAgent' => $request->userAgent(),
        ]);
    }
}