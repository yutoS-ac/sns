<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 開発用ユーザーを定義
            DB::table('users')->insert([
                'username' => Str::random(10),
                'mail' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
    }