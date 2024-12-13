<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
*/
require __DIR__.'/auth.php';



Route::get('/', function () {
    return view('welcome');
});

Route::get('/artists', [ArtistController::class, 'index'])
    ->name('artists.index');
 
Route::get('/artists/create', [ArtistController::class, 'create'])
    ->name('artists.create');

Route::post('/artists', [ArtistController::class, 'store'])
    ->name('artists.store');

Route::get('/artists/{id}', [ArtistController::class, 'show'])
    ->name('artists.show');

Route::get('/artists/{album}', function ($album) {
    return view('artists', ['artists'=>$album]);
});
Route::delete('artists/{id}', [ArtistController::class, 'destroy'])
    ->name('artists.destroy');


Route::get('/profiles', [ProfileController::class, 'index'])
    ->name('profiles.index');
 
Route::get('/profiles/create', [ProfileController::class, 'create'])
    ->name('profiles.create');

Route::post('/profiles', [ProfileController::class, 'store'])
    ->name('profiles.store');

Route::get('/profiles/{id}', [ProfileController::class, 'show'])
    ->name('profiles.show');

Route::delete('profiles/{id}', [ProfileController::class, 'destroy'])
    ->name('profiles.destroy');
    

Route::get('/posts', [PostController::class, 'index'])
->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
->name('posts.show');

Route::get('/posts/{comment}', function ($comment) {
return view('posts', ['posts'=>$comment]);
});
Route::delete('posts/{id}', [PostController::class, 'destroy'])
->name('posts.destroy');



Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments.index');
 
Route::get('/comments/create', [CommentController::class, 'create'])
    ->name('comments.create');

Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store');

Route::get('/comments/{id}', [CommentController::class, 'show'])
    ->name('comments.show');

Route::delete('comments/{id}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');


Route::get('/albums', [AlbumController::class, 'index']);

Route::get('/albums/{id}', [AlbumController::class, 'show']);

Route::get('/albums/{song}', function ($song) {
    return view('albums', ['albums'=>$song]);
});