<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * photosテーブルに追加メタデータフィールドを追加するマイグレーション
 *
 * 写真の解像度、ファイルサイズ、MIMEタイプを格納するカラムを追加します
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     * マイグレーションを実行（カラムを追加）
     *
     * php artisan migrate コマンドを実行すると、このメソッドが呼ばれます
     */
    public function up(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            // width: 画像の幅（ピクセル単位）
            // integer型でNULL許可（データがない場合もあるため）
            $table->integer('width')->nullable()->comment('画像の幅(px)');

            // height: 画像の高さ（ピクセル単位）
            // integer型でNULL許可
            $table->integer('height')->nullable()->comment('画像の高さ(px)');

            // file_size: ファイルサイズ（バイト単位）
            // bigInteger型を使用（大きなファイルにも対応）
            $table->bigInteger('file_size')->nullable()->comment('ファイルサイズ(bytes)');

            // mime_type: ファイルの種類（MIMEタイプ）
            // string型で「image/jpeg」「image/png」などを格納
            $table->string('mime_type', 100)->nullable()->comment('MIMEタイプ（例：image/jpeg）');
        });
    }

    /**
     * Reverse the migrations.
     * マイグレーションをロールバック（カラムを削除）
     *
     * php artisan migrate:rollback コマンドを実行すると、このメソッドが呼ばれます
     * 追加したカラムを削除することで、マイグレーション実行前の状態に戻します
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            // 追加したカラムを削除
            $table->dropColumn(['width', 'height', 'file_size', 'mime_type']);
        });
    }
};
