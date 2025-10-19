<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 写真モデル
 *
 * このモデルは写真情報をデータベースから取得・保存するために使用します
 * モデルの作成のコマンド↓
 * php artisan make:model Photo -m
 * -m オプションでマイグレーションファイルも同時に作成されます
 */
class Photo extends Model
{
    /**
     * （Laravelはテーブル名の単数系をモデル名とすれば自動的にテーブルとモデルを紐づけてくれます）
     */

    /**
     * 一括代入可能な属性
     *
     * フォームから送信されたデータを一括で保存できる項目を指定します
     * セキュリティのため、保存を許可する項目を明示的に指定する必要があります
     */
    protected $fillable = [
        'title',       // 写真タイトル
        'place',       // 撮影場所
        'url',         // 画像URL
        'created_at',  // 撮影日時
    ];

    /**
     * タイムスタンプの自動管理
     *
     * Laravelはデフォルトでcreated_atとupdated_atを自動的に更新します
     * 今回はcreated_atを撮影日時として手動で設定するため、自動更新は有効にしておきます
     */
    public $timestamps = true;
}