<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Administrator',
            'email' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Trương Thị Anh Đào',
            'email' => 'daotta',
            'password' => Hash::make('123456'),
        ]);
    }
}
