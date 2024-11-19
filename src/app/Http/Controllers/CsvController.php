<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CsvRequest;

class CsvController extends Controller
{
    public function getCsv()
    {
        return view('/admin/csv', ['message' => 'CSVファイルをアップロードしてください']);
    }

    public function store(CsvRequest $request)
    {
        $file_validation_array = [
            'csv_file' => ['required', 'file', 'mimes:csv,txt'],
            'shop_image' => ['required', 'file', 'mimes:jpeg,png'],
        ];

        $file_validator = Validator::make($request->all(), $file_validation_array);

        if ($file_validator->fails()) {

            return redirect('/admin/csv')->withErrors($file_validator);
        };

        $csv_file = $request->file('csv_file');
        $csv_file_path = $request->file('csv_file')->path($csv_file);

        $csv_content = new \SplFileObject($csv_file_path);
 
        $csv_content->setFlags(
          \SplFileObject::READ_CSV |
          \SplFileObject::READ_AHEAD |
          \SplFileObject::SKIP_EMPTY |
          \SplFileObject::DROP_NEW_LINE
        );        

        $csv_data = [];

        foreach($csv_content as $value) {

            $value = mb_convert_encoding($value, "UTF-8");
       
            if($value[0] == "shop_name"){
                continue;
            }

            $csv_data[] = [
                'shop_name' => $value[0],
                'area_id' => $value[1],
                'genre_id' => $value[2],
                'content' => $value[3],
            ];
        }

        $data_validation_array = [
            '*.shop_name' => ['required', 'string', 'max:50'],
            '*.area_id' => ['required', 'numeric'],
            '*.genre_id' => ['required', 'numeric'],
            '*.content' => ['required', 'string', 'max:400'],
        ];

        $data_validation_messages = [
            '*.shop_name.required' => '店舗名を入力してください',
            '*.shop_name.string' => '店舗名を文字列で入力してください',
            '*.shop_name.max' => '店舗名は５０字以内で入力してください',
            '*.area_id.required' => 'エリアＩＤを入力してください',
            '*.area_id.numeric' => 'エリアＩＤは数字で入力してください',
            '*.genre_id.required' => 'ジャンルＩＤを入力してください',
            '*.genre_id.numeric' => 'ジャンルＩＤは数字で入力してください',
            '*.content.required' => '店舗概要を入力してください',
            '*.content.string' => '店舗概要は文字列で入力してください',
            '*.content.max' => '店舗概要は４００字以内で入力してください',
        ];

        $csv_validator = Validator::make($csv_data, $data_validation_array, $data_validation_messages);

        if ($csv_validator->fails()) {

            return redirect('/admin/csv')->withErrors($csv_validator);
        };

        $shop_image = $request->file('shop_image');
        $shop_image_path = $shop_image->store('public/shop_images');

        DB::beginTransaction();
        try {
            foreach($csv_data as $value){
                $shop_data = DB::table('shops')->insert([
                    'shop_name' => $value['shop_name'],
                    'area_id' => $value['area_id'],
                    'genre_id' => $value['genre_id'],
                    'content' => $value['content'],
                    'shop_image_path' => $shop_image_path,
                    'created_at' => date("Y/m/d H:i:s"),
                    'updated_at' => date("Y/m/d H:i:s"),
                ]);
           }
            
            DB::commit();

            $message = "登録処理が完了しました。";

        } catch (Throwable $e) {

            DB::rollBack();
            $message = "登録処理に失敗しました。";

        }

        return view('/admin/csv',['message' => $message,]);
    }
}