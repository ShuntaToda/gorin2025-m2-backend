<?php

use App\Http\Controllers\ApiPhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * RESTful APIのルート設定
 *
 * /api 配下にAPIへのルートを定義します
 */

// 写真一覧取得API
// GET /api/photos - タイトルと撮影場所のみを返す
Route::get('/photos', [ApiPhotoController::class, 'index']);

// 写真詳細取得API
// GET /api/photos/{id}.json - 指定されたIDの写真の全メタデータを返す
// 重要：URLに「.json」が必須です
Route::get('/photos/{id}.json', [ApiPhotoController::class, 'show']);
