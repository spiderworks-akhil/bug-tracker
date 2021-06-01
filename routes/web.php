<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController as Page;
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

Route::get('/', [Page::class , 'login']);
Route::post('login', [Page::class , 'attempt_login']);

Route::group([ 'namespace' => 'Admin'], function () {
    Route::group(['middleware' => 'admin'], function () {

        Route::get('dashboard/{site?}', [Page::class , 'dashboard']);

        Route::get('sites', [Page::class , 'sites']);
        Route::get('site/bug-report', [Page::class , 'site_bug_report']);

        Route::post('bug-status', [Page::class , 'set_bug_status']);


        Route::get('logout', [Page::class , 'logout']);


        // Dynamic content
        Route::get('get-bug', [Page::class , 'get_bug'])->name('get.bug');


    });
});


