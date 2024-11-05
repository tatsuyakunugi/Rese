<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'test太郎',
            'email' => 'test@example.com',
            'password' => Hash::make('testpass'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test次郎',
            'email' => 'jiro@example.co.jp',
            'password' => Hash::make('jiro0002'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test三郎',
            'email' => 'saburo@example.co.jp',
            'password' => Hash::make('saburo0003'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test四郎',
            'email' => 'shiro@example.co.jp',
            'password' => Hash::make('shiro0004'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test五郎',
            'email' => 'goro@example.co.jp',
            'password' => Hash::make('goro0005'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test六郎',
            'email' => 'rokuro@example.co.jp',
            'password' => Hash::make('rokuro0006'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test七郎',
            'email' => 'nanaro@example.co.jp',
            'password' => Hash::make('nanaro0007'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test八郎',
            'email' => 'hachiro@example.co.jp',
            'password' => Hash::make('hachiro0008'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test九郎',
            'email' => 'kyuro@example.co.jp',
            'password' => Hash::make('kyuro0009'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test十郎',
            'email' => 'juro@example.co.jp',
            'password' => Hash::make('juro0010'),
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($param);
    }
}
