<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ideas;
use App\Models\Post;
use App\Models\User;

Route::get('/register', function () {
    return view('user_registration');
});

Route::post('/users/store', function (Request $request) {
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'nickname' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email',
        'age' => 'required|integer|min:1|max:120',
        'address' => 'required|string',
        'contact_number' => 'required|string|max:20',
    ]);

    User::create($validated);

    return redirect('/users')->with('success', 'User registered successfully.');
});

Route::get('/users', function () {
    $users = User::all();
    return view('users_list', compact('users'));
});

Route::delete('/users/delete/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/users')->with('success', 'User deleted successfully.');
});

Route::get('/users/edit/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('edit_user', compact('user'));
});

Route::put('/users/update/{id}', function (Request $request, $id) {
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'nickname' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'age' => 'required|integer|min:1|max:120',
        'address' => 'required|string',
        'contact_number' => 'required|string|max:20',
    ]);

    $user->update($validated);

    return redirect('/users')->with('success', 'User updated successfully.');
});

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function () {
    $posts = Post::all();

    return view('formtest', [
        'posts' => $posts,
    ]);
});

Route::post('/formtest', function () {
    Post::create([
        'description' => request('description'),
    ]);

    return redirect('/formtest');
});

Route::delete('/formtest/{id}', function ($id) {
    Post::findOrFail($id)->delete();

    return redirect('/formtest');
});

Route::get('/delete', function () {
    Post::truncate();

    return redirect('/formtest');
});

// index
Route::get('/posts', function () {
    $posts = Post::all();

    return view('posts.index', [
        'posts' => $posts,
    ]);
});

// show
Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => $post,
    ]);
});

// edit
Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post,
    ]);
});

// update
Route::patch('/posts/{post}', function (Post $post) {
    $post->update([
        'description' => request('description'),
        'updated_at' => now(),
    ]);

    return redirect('/posts/' . $post->id);
});