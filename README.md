# 写真管理システム

第63回技能五輪全国大会 - ウェブデザイン職種 - モジュール2（バックエンド）

[モジュール 3（フロントエンド）はこちら](https://github.com/ShuntaToda/gorin2025-m3-frontend)

Laravel 12を使用した写真管理システムです。写真のアップロード、管理、API経由での取得が可能です。

## 機能

### 管理画面
- 写真の一覧表示
- 写真の新規登録（タイトル、撮影場所、画像、撮影日時）
- 写真の編集
- 写真の削除

### API
- `GET /api/photos` - 写真一覧を取得
- `GET /api/photos/{id}.json` - 写真詳細を取得

## 技術スタック

- PHP 8.2+
- Laravel 12
- SQLite

## セットアップ

### 1. 依存関係のインストール

```bash
composer install
```

### 2. 環境設定

`.env.example`をコピーして`.env`を作成し、必要な設定を行います。

```bash
cp .env.example .env
php artisan key:generate
```

### 3. データベースのセットアップ

```bash
php artisan migrate
```

### 4. 開発サーバーの起動

```bash
php artisan serve
npm run dev
```

## プロジェクト構造

### モデル
- `app/Models/Photo.php` - 写真モデル

### コントローラー
- `app/Http/Controllers/AdminPhotoController.php` - 管理画面用コントローラー
- `app/Http/Controllers/ApiPhotoController.php` - API用コントローラー

### ルート
- `routes/web.php` - 管理画面のルート定義
- `routes/api.php` - APIのルート定義

### ビュー
- `resources/views/index.blade.php` - トップページ
- `resources/views/admin/menu.blade.php` - 管理画面メニュー
- `resources/views/admin/photos/` - 写真管理画面

### マイグレーション
- `database/migrations/*_create_photos_table.php` - photosテーブル作成
- `database/migrations/*_add_metadata_to_photos_table.php` - メタデータ追加

## 使い方

### 管理画面にアクセス

1. ブラウザで `http://localhost:8000` にアクセス
2. 「管理画面へ」をクリック
3. 写真管理から写真を登録・編集・削除

### APIの利用

```bash
# 写真一覧を取得
curl http://localhost:8000/api/photos

# 写真詳細を取得
curl http://localhost:8000/api/photos/1.json
```