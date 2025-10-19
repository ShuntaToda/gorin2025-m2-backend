<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面メニュー</title>
    <style>
        /* シンプルなスタイル（デザインは評価対象外） */
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .menu-link {
            display: block;
            padding: 15px;
            margin: 10px 0;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .menu-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    {{-- メインタイトル --}}
    <h1>管理画面メニュー</h1>

    {{-- 写真一覧へのリンク --}}
    {{-- route('admin.photos.index')は、名前付きルートを使って写真一覧ページへのURLを生成します --}}
    <a href="{{ route('admin.photos.index') }}" class="menu-link">
        写真一覧
    </a>
</body>
</html>
