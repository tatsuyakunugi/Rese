<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CsvController extends Controller
{
    public function getCsv()
    {
        return view('/admin/csv', ['message' => 'CSVファイルをアップロードしてください']);
    }

    public function store(Request $request)
    {
        $file_validation_array = [
            'csv_file' => [
                'required',
                'file',
                'max:1024',
                'mimes:csv,txt',
            ],
            'shop_image' => [
                'required',
                'file',
                'mimes:jpeg,png',
            ],
        ];

        $file_validator = Validator::make($request->all(), $file_validation_array );

        if($file_validator->fails())
        {
            return redirect('/admin/csv')->withErrors($file_validator);
        }

        $shop_image = $request->file('shop_image');
        $shop_image_path = $image->store('public/shops');

        $csv_name = $request->file('csv_file')->getClientOriginalName();
        $csv_path = $request->file('csv_file')->storeAs('csv_data', $csv_name);
        
        $csv_content = new \SplFileObject(storage_path('app/csv_data'.$csv_name));

        $csv_content->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );        

        $csv_data = [];

        foreach($csv_content as $value)
        {
            $value = mb_convert_encoding($value, "UTF-8");

            if($value[0] == "店舗名")
            {
                continue;
            }

            $csv_data[] = [
                'shop_name' => $value[0],
                'area_id' => $value[1],
                'genre_id' => $value[2],
                'content' => $value[4],
            ];

            $csv_validator = Validator::make($csv_data, $data_varidation_array);

            if($csv_validator->fails())
            {
                Storage::delete('csv_data/'.$csv_name);

                return redirect('/admin/csv')->withErrors($csv_validator);
            }

            DB::beginTransaction();
            try {
                foreach($csv_data as $value){
                    $shop_data = DB::table('shops')->insert([
                        'shop_name' => $value[0],
                        'area_id' => $value[1],
                        'genre_id' => $value[2],
                        'content' => $value[4],
                        'shop_image_path' => $shop_image_path,
                        'created_at' => date("Y/m/d H:i:s"),
                        'updated_at' => date("Y/m/d H:i:s"),
                    ]);
               }

                DB::commit();
                $message = "登録処理が完了しました";

            }catch(Throwable $e){
                DB::rollBack();
                $message = "登録処理に失敗しました";
            }

            Storage::delete('csv_data/'.$csv_name);

            return view('/admin/csv', ['message' => $message,]);
        }
    }
}