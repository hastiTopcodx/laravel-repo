<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Auth::routes();
Route::resource('posts' , PostController::class);
Route::post('/posts/{id}/comment/store', [PostController::class, 'postCommentStore'])->name('post-comment-store');
Route::get('/comments', [\App\Http\Controllers\TestController::class, 'index']);

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/post', [PostController::class, 'store'])->name('posts.store');
//Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
//Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
//Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
//

Route::get('/', function (){
   return 'Home';
});
