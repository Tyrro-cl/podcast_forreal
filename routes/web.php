<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/microsoft/redirect', function () {
    return Socialite::driver('azure')->redirect();
});
Route::get('/login/microsoft/callback', function () {
    $socialiteUser = Socialite::driver('azure')->user();

    $user = \App\Models\User::where([
        'provider' => 'azure',
        'provider_id' => $socialiteUser->getId()
    ])->first();

    if(!$user) {
        $user = \App\Models\User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'provider' => 'azure',
            'provider_id' => $socialiteUser->getId(),
            'email_verified_at' => now()
        ]);
    }

    dd($user->getName(),$user->getEmail(),$user->getId());
    // $user->token
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('users/{user}/create', [UserController::class, 'create'])->name('users.create');
Route::get('users/{user}/modify', [UserController::class, 'modify'])->name('users.modify');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');


require __DIR__.'/auth.php';

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
