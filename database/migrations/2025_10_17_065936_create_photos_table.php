<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * マイグレーションを実行（テーブルを作成）
     *
     * php artisan migrate コマンドを実行すると、このメソッドが呼ばれます
     */
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            // id: 主キー（自動採番される一意の識別番号）
            $table->id();

            // title: 写真タイトル（最大255文字、必須）
            $table->string('title', 255);

            // place: 撮影場所（最大255文字、必須）
            $table->string('place', 255);

            // url: 画像URL（長いテキストを保存できるTEXT型、必須）
            $table->text('url');

            // created_at: 撮影日時（NULLを許可）
            // updated_at: 更新日時（NULLを許可）
            // timestamps()メソッドは、created_atとupdated_atの2つのカラムを自動的に作成します
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * マイグレーションをロールバック（テーブルを削除）
     *
     * php artisan migrate:rollback コマンドを実行すると、このメソッドが呼ばれます
     * テーブルを削除することで、マイグレーション実行前の状態に戻します
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
