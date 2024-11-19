<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvRequest extends FormRequest
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
            'csv_file' => 'required|file|mimes:csv,txt',
            'shop_image' => 'required|file|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'csv_file.required' => 'csvファイルは必須です',
            'csv_file.file' => 'csvファイルはファイル形式の物を選択してください',
            'csv_file.mimes'     => 'ファイル拡張子がcsv形式の物を選択してください',
            'shop_image.required' => '店舗画像ファイルは必須です',
            'shop_image.file' => '画像ファイルを選択してください',
            'shop_image.mimes' => '画像はjpeg、もしくはpng形式の物を選択してください',
        ];
    }
}
