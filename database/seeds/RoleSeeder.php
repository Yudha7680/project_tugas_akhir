<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'created_at' => '2021-06-30 00:23:17',
                'updated_at' => '2021-06-30 00:23:17',
            ], [
                'name' => 'User',
                'created_at' => '2021-06-30 00:23:17',
                'updated_at' => '2021-06-30 00:23:17',
            ]
        ]);
    }
}
