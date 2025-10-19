<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>写真一覧</title>
    <style>
        /* シンプルなスタイル（デザインは評価対象外） */
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .btn {
            padding: 8px 15px;
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
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .actions {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <h1>写真一覧</h1>

    {{-- 成功メッセージの表示 --}}
    {{-- session('success')は、リダイレクト時に保存された成功メッセージを取得します --}}
    @if(session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    {{-- エラーメッセージの表示 --}}
    {{-- session('error')は、リダイレクト時に保存されたエラーメッセージを取得します --}}
    @if(session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif
    {{-- 新規登録ボタン（ヘッダー部分） --}}
    {{-- route('admin.photos.create')は、新規登録フォームへのURLを生成します --}}
    <div>
        <a href="{{ route('admin.photos.create') }}" class="btn btn-primary">写真情報新規登録</a>
    </div>

    {{-- 写真一覧テーブル --}}
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>撮影場所</th>
                <th>撮影日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            {{-- データが存在するかチェック --}}
            @if(count($photos) > 0)
                {{-- $photosに格納された写真情報を1件ずつ表示 --}}
                {{-- foreachは、配列やコレクションの要素を1つずつ取り出してループ処理します --}}
                @foreach($photos as $photo)
                    <tr>
                        {{-- 二重中括弧はBladeのエスケープ構文で、XSS攻撃を防ぐため自動的にHTMLエスケープされます --}}
                        <td>{{ $photo->title }}</td>
                        <td>{{ $photo->place }}</td>
                        <td>{{ $photo->created_at }}</td>
                        <td class="actions">
                            {{-- 編集ボタン：該当写真の編集フォームへ遷移 --}}
                            <a href="{{ route('admin.photos.edit', $photo->id) }}" class="btn btn-success">編集</a>

                            {{-- 削除ボタン：JavaScriptで確認ダイアログを表示してから削除処理を実行 --}}
                            <form action="{{ route('admin.photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
                                {{-- csrfは、CSRF攻撃を防ぐためのトークンを生成します --}}
                                @csrf
                                {{-- method('DELETE')は、HTMLフォームでDELETEメソッドを使用するための疑似メソッド --}}
                                @method('DELETE')
                                {{-- onclick="return confirm(...)"で削除前に確認ダイアログを表示 --}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                {{-- データが1件もない場合の表示 --}}
                <tr>
                    <td colspan="4" style="text-align: center;">写真情報がありません</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
