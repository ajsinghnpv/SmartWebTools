<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tools\IPToolController;
use App\Http\Controllers\Tools\JsonFormatterController;
use App\Http\Controllers\Tools\CommaSeparatorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-ip', [IPToolController::class, 'show'])->name('tools.my-ip');

// For JSON Formatter 
Route::controller(JsonFormatterController::class)->group(function(){
    Route::get('/json-formatter',  'index')->name('tools.json-formatter');
    Route::post('/json-formatter', 'format');
});

// Comma Seperated Tool 
Route::controller(CommaSeparatorController::class)->group(function()
{
Route::get('/comma-separator',  'index')->name('tools.comma-separator');
Route::post('/comma-separator',  'process');
});



// Internet Speed Test 

Route::get('/internet-speed-test', [\App\Http\Controllers\Tools\SpeedTestController::class, 'index'])->name('tools.speed-test');

Route::post('/upload-test', function () {
    return response()->json(['status' => 'ok']);
});


Route::post('/save-speed-test',[\App\Http\Controllers\Tools\SpeedTestController::class, 'saveSpeedTest']);