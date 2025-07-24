<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;

Route::get('/', function () {
return view('blog.home');
});
Route::get('/post/{id}', function ($id) {
    return view('blog.single', compact('id'));
});
Route::get('/category/{id}/{name}', function ($id, $name) {
    return view('blog.category', compact('id', 'name'));
});
// ✅ Login-Routen außerhalb der Middleware
Route::get('/login', function () {
return view('admin.login');
});
Route::post('/login', [UsersController::class, 'login']);
// ✅ Geschützte Admin-Routen
Route::middleware(['authMiddleware'])->group(function () {


    Route::get('/logout', [UsersController::class, 'logout']);


    Route::get('/admin', function () {
return view('admin.categories');
});

Route::post('/create_category', [CategoriesController::class, 'create']);
    Route::get('/del_category/{id}', [CategoriesController::class, 'del_category'])->name('del_category');

Route::get('/admin/posts', function () {
return view('admin.posts');
});
Route::post('/create_post', [PostsController::class, 'create']);
Route::get('/delete_post/{id}', [PostsController::class, 'delete_post']);

Route::get('/admin/users', function () {
return view('admin.users');
});
Route::post('/create_user', [UsersController::class, 'create']);
Route::get('/del_user/{id}', [UsersController::class, 'del_user']);
});
