<?php

use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\ShowPosts;
use App\Livewire\Posts\UpdatePost;
use App\Livewire\Users\Profile;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::get('/profile', Profile::class)
    ->middleware(['auth'])
    ->name('profile');

Route::group([
    'prefix' => 'posts',
    'middleware' => 'auth',
    'as' => 'posts.'
], function () {
    Route::get('/', ShowPosts::class)->name('index');
    Route::get('/create', CreatePost::class)->name('create');
    Route::get('/{post}/edit', UpdatePost::class)->name('edit');
});

require __DIR__.'/auth.php';
