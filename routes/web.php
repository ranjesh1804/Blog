

<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Author\CreatePost;
use App\Livewire\User\Post;
use App\Livewire\User\ViewPost;

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
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::prefix('author')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'Author'])->group(function () {

  
    Route::get('create_post', CreatePost::class)->name('create_post');


});

Route::prefix('user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'User'])->group(function () {

        Route::get('post', Post::class)->name('post');
        Route::get('view_post/{id}', ViewPost::class)->name('user.view_post');


});