<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PeriodicPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    // dd(\Auth::user()->is_approved ." ". \Auth::user()->profile_photo_url);
    $user = \Auth::user();
    if (!\Auth::check()) {

        return view('welcome');
    }

    if ($user->hasRole('member-user')) {
        if (\Auth::user()->is_approved) {
            return view('website.home');
        }
        return view('website.temporary-landing');
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
    Route::group(['prefix' => 'web', 'middleware' => 'role:super-admin|member-user','as' => 'web.'], function () {

        //USER HOME
        Route::get('/', function () {
            if ($user->hasRole('member-user')) {
                if (\Auth::user()->is_approved) {
                    return view('website.home');
                }
                return view('website.temporary-landing');
            }
            return view('website.home');
        })->name('home');

        //NOTIFICATIONS
        Route::post('/get-user-notifications/{dropdown_state?}', [UsersController::class, 'renderedNotificationDropdownData'])->name('rendernotifications');
        Route::post('/mark-user-notifications/{notification_id}/{dropdown_state?}', [UsersController::class, 'markNotificationAsRead'])->name('marknotification');
        Route::post('/markall-user-notifications/{dropdown_state?}', [UsersController::class, 'markAllNotificationAsRead'])->name('markallnotification');

    });

    //ROUTE GROUP::ADMIN
    Route::group(['prefix' => 'admin', 'middleware' => 'role:system-manager|membership-admin|finance-admin|super-admin', 'as' => 'admin.'], function () {

        //ADMIN HOME
        Route::get('/', function () {
            return view('admin.home');
        })->name('home');

        //NOTIFICATIONS
        Route::post('/get-user-notifications/{dropdown_state?}', [UsersController::class, 'renderedNotificationDropdownData'])->name('rendernotifications');
        Route::post('/mark-user-notifications/{notification_id}/{dropdown_state?}', [UsersController::class, 'markNotificationAsRead'])->name('marknotification');
        Route::post('/markall-user-notifications/{dropdown_state?}', [UsersController::class, 'markAllNotificationAsRead'])->name('markallnotification');

        //ROUTE GROUP::ADMIN/MANAGE
        Route::group(['prefix' => 'manage', 'as' => 'manage.'], function () {

            //SYSTEM_USERS
            Route::resource('users', \App\Http\Controllers\Admin\UsersController::class)->names([
                'index' => 'user.index',
                'store' => 'user.store',
                'create' => 'user.create',
                'edit' => 'user.edit',
                'update' => 'user.update',
                'destroy' => 'user.destroy',
                'show' => 'user.show',
            ]);

            //FINANCE:: Subscription Periods
            Route::group(['prefix' => 'finance', 'as' => 'finance.'], function () {

                //periodic payments
                Route::get('/', [PeriodicPaymentController::class, 'index'])->name('index');

                //add subscription period
                Route::post('/create-period', [PeriodicPaymentController::class, 'addPeriod'])->name('addperiod');

                //edit subscription period
                Route::post('/edit-period', [PeriodicPaymentController::class, 'editPeriod'])->name('editperiod');

                //add payment detail
                Route::post('/create-payment', [PeriodicPaymentController::class, 'addPaymentDetail'])->name('addpayment');

                //edit payment detial
                Route::post('/edit-payment', [PeriodicPaymentController::class, 'editPaymentDetail'])->name('editpayment');

                //delete payment detail
                Route::delete('/delete-payment/{member_id}/{subscription_period_id}', [PeriodicPaymentController::class, 'deletePaymentDetail'])->name('deletepayment');

            });
            Route::get('/admin/profiles', function(){
                return view('admin.manage.members.profiles');
            })->name('profiles');


        });
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
