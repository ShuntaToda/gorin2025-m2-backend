<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

/**
 * API用の写真管理コントローラー
 *
 * このコントローラーは案内用画面に写真情報をJSON形式で提供します
 */
class ApiPhotoController extends Controller
{
    /**
     * 写真一覧を取得（タイトルと撮影場所のみ）
     *
     * GET /api/photos でアクセスされます
     * 全ての写真のタイトルと撮影場所をJSON形式で返します
     */
    public function index()
    {
        try {
            // 全ての写真情報を取得し、タイトルと撮影場所のみを選択
            $photos = Photo::select('title', 'place')->get();

            // HTTPステータスコード200（成功）でJSON形式のデータを返す
            return response()->json($photos, 200);
        } catch (\Exception $e) {
            // エラーが発生した場合、HTTPステータスコード404（エラー）を返す
            return response()->json(['error' => 'データの取得に失敗しました'], 404);
        }
    }

    /**
     * 写真詳細を取得（全メタデータ）
     *
     * GET /api/photos/{id}.json でアクセスされます
     * 指定されたIDの写真の全情報をJSON形式で返します
     */
    public function show($id)
    {
        try {
            // 指定されたIDの写真情報を取得（存在しない場合は例外が発生）
            $photo = Photo::findOrFail($id);

            // 必要な項目のみを選択してJSON形式で返す
            $data = [
                'title' => $photo->title,           // 写真タイトル
                'place' => $photo->place,           // 撮影場所
                'url' => $photo->url,               // 画像URL
                'created_at' => $photo->created_at, // 撮影日時
                'updated_at' => $photo->updated_at, // 更新日時
            ];

            // HTTPステータスコード200（成功）でJSON形式のデータを返す
            return response()->json($data, 200);
        } catch (\Exception $e) {
            // 写真が見つからない、またはエラーが発生した場合
            // HTTPステータスコード404（エラー）を返す
            return response()->json(['error' => '写真が見つかりません'], 404);
        }
    }
}
