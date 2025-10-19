<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>写真管理システム</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 30px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a:hover {
            background: #0056b3;
        }
        ul {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        li {
            padding: 10px;
            background: #f5f5f5;
            margin-bottom: 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <h1>写真管理システム</h1>
    <a href="/admin">管理画面へ</a>

    <h2>API</h2>
    <ul>
        <li>GET /api/photos - 写真一覧</li>
        <li>GET /api/photos/{id} - 写真詳細</li>
    </ul>
</body>
</html>
