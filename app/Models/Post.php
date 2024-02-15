<?php
//MVCのM(モデル部分)でPostsテーブルの単数形で作成する
//DB処理と接続を行うクラス

namespace App\Models; //フォルダのどこか

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model //Modelを継承する
{
    use HasFactory;
    
    //データ取得件数制限をかけ、降順に並べるようにし、ページの目次？を追加する
    public function getPaginateByLimit(int $limit_count = 5)
    //$limit_countで取得件数を絞る
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
        //orderBY('第一引数','第二引数')とは
        //第一引数に基準となるカラム名を、第二引数に昇順か降順か記載する
        //paginateとはページの目次？を追加するので5個ずつ表示する
        //$this->○○で一つの変数として扱う
        
    }
    
}
