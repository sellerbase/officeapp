<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\CheckUserType;

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
});

// Kernel.phpの$routeMiddlewareに'user.type' => \App\Http\Middleware\CheckUserType::classが正しく記載されていることを確認しました。
// CheckUserTypeミドルウェアの実装を確認する手順:
// 1. CheckUserTypeミドルウェアのhandleメソッドがリクエストを正しく処理しているか確認してください。
// 2. Auth::user()がnullでないこと、及びAuth::user()->typeが指定された$typeと一致するかを確認してください。
// 3. ユーザータイプが一致しない場合に403エラーが適切に発生するかテストしてください。
// テスト方法:
// a. 異なるユーザータイプでアクセスを試み、403エラーが返されるか確認します。
// b. 正しいユーザータイプでアクセスし、正常にページが表示されるか確認します。
Route::middleware(['user.type:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
});

require __DIR__.'/auth.php';