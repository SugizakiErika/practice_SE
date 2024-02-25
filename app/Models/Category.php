<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    //モデルクラスにリレーションを記述する 
    //1対多の関係なので'posts'と複数形にする
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    //Categiryモデルに地震に属する投稿を取得する処理を追加
    //カテゴリー毎に属する投稿を取得する処理を追加する
    public function getByCategory(int $limit_count = 5)
    {
        return $this->posts()->with('category')->orderBy('updated_at','DESC')->pagenate($limit_count);
        //$thisには選択されたCategoryのインスタンスが入っており、
        //そのカテゴリーが持つ投稿を呼び出している
    }
}
