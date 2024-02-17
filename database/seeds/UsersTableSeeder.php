<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザー登録をする
        DB::table('users') -> insert(
            [
                'username' => 'tanaka',
                'mail' =>'sample@gmail.com',
                'password' => bcrypt('kadai0204')
            ],
        );
    }
}
