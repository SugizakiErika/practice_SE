<?php
//php artisan make:request PostRequestで作成する
//バリデーションを行うクラス
//(入力内容が指定したルールを満たしているか正しいか確認するクラス)

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //public function authorize()
    //{
    //    return true;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    //rulesという関数で返却する配列にバリデーションを適用する
    {
        return [
            //書式'キー名'=>'ルール1|ルール2|ルール3|',(複数の場合「|」で区切ってるだけ)
            //左側から評価されてエラーがあれば段階で
            //返却されてcreate.blade.phpのエラーメッセージに送信される
            //post[title]はpost.titleにする
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
        ];
    }
}
