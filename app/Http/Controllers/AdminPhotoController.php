<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

/**
 * 管理画面の写真管理コントローラー
 *
 * このコントローラーは管理者が写真情報を登録・編集・削除するための機能を提供します
 */
class AdminPhotoController extends Controller
{
    /**
     * 写真一覧を表示
     *
     * データベースから全ての写真情報を取得し、一覧画面に表示します
     */
    public function index()
    {
        // 全ての写真情報をデータベースから取得（新しい順に並べる）
        $photos = Photo::orderBy('created_at', 'desc')->get();

        // 取得した写真情報をビューに渡して表示
        return view('admin.photos.index', compact('photos'));
    }

    /**
     * 新規登録フォームを表示
     *
     * 写真情報を新規登録するためのフォームを表示します
     */
    public function create()
    {
        // 新規登録フォームのビューを表示
        return view('admin.photos.create');
    }

    /**
     * 写真情報を新規登録
     *
     * フォームから送信された写真情報をデータベースに保存します
     */
    public function store(Request $request)
    {
        // バリデーション: 入力値が正しいかチェック
        $validated = $request->validate([
            'title' => 'required|max:255',       // タイトルは必須、最大255文字
            'place' => 'required|max:255',       // 撮影場所は必須、最大255文字
            'url' => 'required',                 // 画像URLは必須
            'created_at' => 'required|date',     // 撮影日時は必須、日付形式
        ]);

        // バリデーションエラーがなければ、データベースに保存
        try {
            // Photoモデルを使って新しいレコードを作成
            Photo::create($validated);

            // 成功メッセージを表示して一覧画面にリダイレクト
            return redirect()->route('admin.photos.index')
                ->with('success', '写真情報が登録されました');
        } catch (\Exception $e) {
            // エラーが発生した場合、エラーメッセージを表示して前の画面に戻る
            return back()->with('error', 'エラーが発生しました')->withInput();
        }
    }

    /**
     * 編集フォームを表示
     *
     * 指定されたIDの写真情報を取得し、編集フォームに表示します
     */
    public function edit($id)
    {
        // 指定されたIDの写真情報を取得（存在しない場合は404エラー）
        $photo = Photo::findOrFail($id);

        // 編集フォームのビューに写真情報を渡して表示
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * 写真情報を更新
     *
     * フォームから送信された情報で、既存の写真情報を更新します
     */
    public function update(Request $request, $id)
    {
        // バリデーション: 入力値が正しいかチェック
        $validated = $request->validate([
            'title' => 'required|max:255',       // タイトルは必須、最大255文字
            'place' => 'required|max:255',       // 撮影場所は必須、最大255文字
            'url' => 'required',                 // 画像URLは必須
            'created_at' => 'required|date',     // 撮影日時は必須、日付形式
        ]);

        // 更新処理を実行
        try {
            // 指定されたIDの写真情報を取得
            $photo = Photo::findOrFail($id);

            // 写真情報を更新
            $photo->update($validated);

            // 成功メッセージを表示して一覧画面にリダイレクト
            return redirect()->route('admin.photos.index')
                ->with('success', '写真情報が更新されました');
        } catch (\Exception $e) {
            // エラーが発生した場合、エラーメッセージを表示して前の画面に戻る
            return back()->with('error', 'エラーが発生しました')->withInput();
        }
    }

    /**
     * 写真情報を削除
     *
     * 指定されたIDの写真情報をデータベースから削除します
     */
    public function destroy($id)
    {
        try {
            // 指定されたIDの写真情報を取得
            $photo = Photo::findOrFail($id);

            // 写真情報を削除
            $photo->delete();

            // 成功メッセージを表示して一覧画面にリダイレクト
            return redirect()->route('admin.photos.index')
                ->with('success', '写真情報が削除されました');
        } catch (\Exception $e) {
            // エラーが発生した場合、エラーメッセージを表示
            return back()->with('error', 'エラーが発生しました');
        }
    }
}
