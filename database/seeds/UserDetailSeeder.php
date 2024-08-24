<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->insert([
            [
                'user_id' => 1,
                'nik' => '12345678910',
                'seksie' => 'seksie',
                'photo' => null,
                'created_at' => '2021-06-30 00:23:17',
                'updated_at' => '2021-06-30 00:23:17',
            ],
            [
                'user_id' => 2,
                'nik' => '12345678910',
                'seksie' => 'seksie',
                'photo' => null,
                'created_at' => '2021-06-30 00:23:17',
                'updated_at' => '2021-06-30 00:23:17',
            ],
        ]);
    }
}
