<?php

use App\Http\Controllers\AdminPhotoController;
use Illuminate\Support\Facades\Route;

/**
 * 管理画面のルート設定
 *
 * /admin 配下に管理画面へのルートを定義します
 */

Route::get('/', function () {
    return view('index');
});

// 管理画面メニュー
// GET /admin にアクセスすると、メニュー画面を表示
Route::get('/admin', function () {
    return view('admin.menu');
})->name('admin.menu');

// 写真管理のルート（/admin/photos配下）
// Route::prefix()で共通のURLプレフィックスを設定
// Route::name()で共通のルート名プレフィックスを設定
Route::prefix('admin/photos')->name('admin.photos.')->group(function () {
    // GET /admin/photos - 写真一覧表示
    Route::get('/', [AdminPhotoController::class, 'index'])->name('index');

    // GET /admin/photos/create - 新規登録フォーム表示
    Route::get('/create', [AdminPhotoController::class, 'create'])->name('create');

    // POST /admin/photos - 新規登録処理
    Route::post('/', [AdminPhotoController::class, 'store'])->name('store');

    // GET /admin/photos/{id}/edit - 編集フォーム表示
    Route::get('/{id}/edit', [AdminPhotoController::class, 'edit'])->name('edit');

    // PUT /admin/photos/{id} - 更新処理
    Route::put('/{id}', [AdminPhotoController::class, 'update'])->name('update');

    // DELETE /admin/photos/{id} - 削除処理
    Route::delete('/{id}', [AdminPhotoController::class, 'destroy'])->name('destroy');
});
