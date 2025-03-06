<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\lifeControllerTest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

// Route::get('/compoment_test1',[ComponentTestController::class,'component_test1']);
// Route::get('/compoment_test2',[ComponentTestController::class,'component_test2']);
// Route::get('/servicecontrollertest',[lifeControllerTest::class,'showServiceContainerTest']);
// Route::get('/serviceprovidertest',[lifeControllerTest::class,'showServiceProviderTest']);

require __DIR__.'/auth.php';
