<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>写真情報新規登録</title>
    <style>
        /* シンプルなスタイル（デザインは評価対象外） */
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h1>写真情報新規登録</h1>

    {{-- エラーメッセージの表示 --}}
    @if(session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    {{-- バリデーションエラーメッセージの表示 --}}
    @if($errors->any())
        <div class="message error">
            エラーが発生しました
        </div>
    @endif

    {{-- 新規登録フォーム --}}
    {{-- action属性で送信先URLを指定、method="POST"でPOSTメソッドを使用 --}}
    <form action="{{ route('admin.photos.store') }}" method="POST">
        {{-- CSRF保護トークン（必須） --}}
        {{-- このトークンがないと、Laravelはリクエストを拒否します --}}
        @csrf

        {{-- タイトル入力欄 --}}
        <div class="form-group">
            <label for="title">写真タイトル <span style="color: red;">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </div>

        {{-- 撮影場所入力欄 --}}
        <div class="form-group">
            <label for="place">撮影場所 <span style="color: red;">*</span></label>
            <input type="text" id="place" name="place" value="{{ old('place') }}">
        </div>

        {{-- 画像URL入力欄 --}}
        <div class="form-group">
            <label for="url">画像URL <span style="color: red;">*</span></label>
            <input type="text" id="url" name="url" value="{{ old('url') }}">
        </div>

        {{-- 撮影日時入力欄 --}}
        <div class="form-group">
            <label for="created_at">撮影日時 <span style="color: red;">*</span></label>
            {{-- datetime-local型で日時を入力 --}}
            <input type="datetime-local" id="created_at" name="created_at" value="{{ old('created_at') }}">
        </div>

        {{-- ボタン --}}
        <div>
            {{-- 登録ボタン --}}
            <button type="submit" class="btn btn-primary">登録</button>
            {{-- 一覧に戻るボタン --}}
            <a href="{{ route('admin.photos.index') }}" class="btn btn-secondary">戻る</a>
        </div>
    </form>
</body>
</html>
