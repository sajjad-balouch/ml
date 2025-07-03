<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\WithdrawAccountController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Plan;


Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear'); // optional

    return 'All caches (config, route, cache, view) have been cleared!';
});

Route::get('/', function () {
    $plans = Plan::all();
    return view('index', compact('plans'));
});
Route::get('/enter',function()
{
    return view('welcome');
})->name('enter');
Route::get('/logout', function (Request $request) {
    Auth::logout();
    return redirect('/');
})->name('logout');
Auth::routes();
Route::get('/register/{id?}', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin routes
Route::group(['prefix' => 'admin','middleware'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin');

    // plan routes
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');
    Route::get('/plan/create', [PlanController::class, 'create'])->name('plan.create');
    Route::post('/plan/store', [PlanController::class, 'store'])->name('plan.store');
    Route::get('/plan/edit/{id}', [PlanController::class, 'edit'])->name('plan.edit');
    Route::get('/plan/destroy/{id}', [PlanController::class, 'destroy'])->name('plan.destroy');
    Route::post('/plan/update/{id}', [PlanController::class, 'update'])->name('plan.update');
    // end plan routes

    // withdraw account routes
    Route::get('/withdraw_accounts',[WithdrawAccountController::class,'index'])->name('admin.withdraw_accounts');
    Route::get('/withdraw_types/create',[WithdrawAccountController::class,'create'])->name('admin.withdraw_types.create');
    Route::post('/withdraw_types/store',[WithdrawAccountController::class,'store'])->name('admin.withdraw_types.store');
    Route::get('/withdraw_types/edit/{id}',[WithdrawAccountController::class,'edit'])->name('admin.withdraw_types.edit');
    Route::get('/withdraw_types/destroy/{id}',[WithdrawAccountController::class,'destroy'])->name('withdraw_types.destroy');
    Route::post('/update/{id}',[WithdrawAccountController::class,'update'])->name('admin.withdraw_types.update');
    // end withdraw account routes

    // payment account routes
    Route::get('/accounts',[AccountController::class,'index'])->name('admin.accounts');
    Route::get('/create',[AccountController::class,'create'])->name('admin.account.create');
    Route::post('/store',[AccountController::class,'store'])->name('admin.account.store');
    Route::get('/edit/{id}',[AccountController::class,'edit'])->name('admin.account.edit');
    Route::get('/account/destroy/{id}',[AccountController::class,'destroy'])->name('account.destroy');
    Route::post('/update/{id}',[AccountController::class,'update'])->name('admin.account.update');
    // end payment account routes

    // deposit requets
    Route::get('/pending-deposits',[AdminController::class,'pending_deposits'])->name('admin.pedning-deposits');
    Route::get('/approved-deposits',[AdminController::class,'approved_deposits'])->name('admin.approved-deposits');

    Route::get('/approve-deposit/{id}',[AdminController::class,'approve_deposit'])->name('approve-deposit');
    Route::get('/destroy-deposit/{id}',[AdminController::class,'destroy_deposit'])->name('destroy-deposit');
    // end deposit requests

    // withdraw routes
    Route::get('/pending-withdraw',[AdminController::class,'pending_withdraw'])->name('admin.pedning-withdraw');
    Route::get('/approved-withdraw',[AdminController::class,'approved_withdraw'])->name('admin.approved-withdraw');

    Route::get('/approve-withdraw/{id}',[AdminController::class,'approve_withdraw'])->name('approve-withdraw');
    Route::get('/destroy-withdraw/{id}',[AdminController::class,'destroy_withdraw'])->name('destroy-deposit');
    // end withdraw routes

    // user routes
    Route::get('/all-users',[UserController::class,'all_users'])->name('all-users');
    Route::get('/active-users',[UserController::class,'active_users'])->name('active-users');
    Route::get('/inactive-users',[UserController::class,'inactive_users'])->name('inactive-users');
    Route::get('/user-detail/{id}',[UserController::class,'user_detail'])->name('user-detail');
    Route::get('/change-password/{id}',[UserController::class,'change_password_view'])->name('admin.change-password');
    Route::post('/update-password',[UserController::class,'update_user_password'])->name('admin.update-password');
    Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('destroy');
    // end user routes

});
// end admin routes

// user routes
Route::group(['prefix' => 'user','middleware'=>'normal'],function(){
    Route::get('/',[UserController::class,'index'])->name('user');
    Route::get('/deposit-view',[UserController::class,'deposit_view'])->name('user.deposit-view');
    Route::post('/deposit-store',[UserController::class,'deposit_store'])->name('user.deposit-store');
    Route::get('/qrcode/{id}',[UserController::class,'qrcode'])->name('user.qrcode');
    Route::get('/eidi',[UserController::class,'eidi'])->name('user.eidi');

    // withdraw routes
    Route::get('/withdraw-view',[UserController::class,'withdraw_view'])->name('user.withdraw-view');
    Route::post('/withdraw-store',[UserController::class,'withdraw_store'])->name('user.withdraw-store');
    // end withdraw routes

    // profile routes
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('/change-password',[UserController::class,'change_password'])->name('change-password');
    Route::post('/change-avatar',[UserController::class,'change_avatar'])->name('change-avatar');
    Route::post('/change-name',[UserController::class,'change_name'])->name('change-name');
    // end profile routes

    // transactions
    Route::get('/transactions',[UserController::class,'histroy'])->name('user.transactions');
    Route::get('/team',[UserController::class,'team'])->name('user.team');
    Route::post('/upload-proof',[UserController::class,'proof'])->name('user.upload-proof');
    // end transaction

});
// end user routes

Route::middleware('auth')->group(function () {
    Route::get('/impersonate/{id}', function ($id) {
        $userToImpersonate = User::findOrFail($id);
        auth()->user()->impersonate($userToImpersonate);
        return redirect('user/'); // or any user-facing route
    })->name('impersonate');

    Route::get('/leave-impersonation', function () {
        auth()->user()->leaveImpersonation();
        return redirect('admin/'); // or your admin area
    })->name('impersonate.leave');
});