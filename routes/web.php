<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

//HOME
Route::get('/', function() {
    if (!\Auth::check()) {
        return view('welcome');
    }

    return view('website.home');
})->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


//ROUTE GROUP::AUTH
Route::group(['middleware' => 'auth'], function () {

    //ROUTE GROUP::WEBSITE
    Route::group(['prefix' => 'web',  'as' => 'web.'], function () {

        //USER HOME
        Route::get('/', function () {
            return view('website.home');
        })->name('home');

        //NOTIFICATIONS
        Route::post('/get-user-notifications/{dropdown_state?}', [UsersController::class, 'renderedNotificationDropdownData'])->name('rendernotifications');
        Route::post('/mark-user-notifications/{notification_id}/{dropdown_state?}', [UsersController::class, 'markNotificationAsRead'])->name('marknotification');
        Route::post('/markall-user-notifications/{dropdown_state?}', [UsersController::class, 'markAllNotificationAsRead'])->name('markallnotification');


    });

    //ROUTE GROUP::ADMIN
    Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {

        //ADMIN HOME
        Route::get('/', function(){
            return view('admin.home');
        })->name('home');

        //NOTIFICATIONS
        Route::post('/get-user-notifications/{dropdown_state?}', [UsersController::class, 'renderedNotificationDropdownData'])->name('rendernotifications');
        Route::post('/mark-user-notifications/{notification_id}/{dropdown_state?}', [UsersController::class, 'markNotificationAsRead'])->name('marknotification');
        Route::post('/markall-user-notifications/{dropdown_state?}', [UsersController::class, 'markAllNotificationAsRead'])->name('markallnotification');

    });

    //USER PROFILE
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    //LOGOUT
    Route::get('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');


});


