<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required',
            'comment' => 'required|max:400',
            'image' => 'nullable|file|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => '評価を選択してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントは４００字以内で記入してください',
            'image.file' => '画像ファイルを選択してください',
            'image.mines' => '画像はjpeg、もしくはpng形式の物を選択してください',
        ];
    }
}
