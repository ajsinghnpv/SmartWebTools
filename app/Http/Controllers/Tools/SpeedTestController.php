<?php 

namespace App\Http\Controllers\Tools;
use App\Models\SpeedTest;
use Illuminate\Support\Facades\Request;
class SpeedTestController
{
    public function index()
    {
        return view('tools.speed-test');
    }

    public function saveSpeedTest(Request $request)
    {
        dd('djfhd');
        SpeedTest::create([
        'ip' => request()->ip(),
        'download_speed' => request('download'),
        'upload_speed' => request('upload'),
        'ping' => request('ping'),
    ]);
        return response()->json(['saved' => true]); 
    }


    public function index2()
    {

        Post::select('tags')->get();

        
    }
}