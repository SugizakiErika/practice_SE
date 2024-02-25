<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            //'category_id'は'categoriesテーブル'の'id'を参照する外部キー
            //$table->foreignId('category_id')->constrained()->onDelete('cascade');
            //cascade:親テーブル(categoryテーブル)の操作を子テーブル(postsテーブル)にも
            //反映させる
            //onDelete('cascade'):削除時のcascadeの設定ができる
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
