<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Superadministrator',
                'email' => 'superadministrator@app.com',
                'password' => Hash::make('password'),
                'created_at' => '2021-06-30 00:23:17',
                'updated_at' => '2021-06-30 00:23:17',
            ],
            [
                'role_id' => 2,
                'name' => 'User',
                'email' => 'user@app.com',
                'password' => Hash::make('password'),
                'created_at' => '2021-06-30 00:23:17',
                'updated_at' => '2021-06-30 00:23:17',
            ],
        ]);
    }
}
