<?php

namespace Database\Seeders;

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
        $data=array(
            array(
                'password'=>Hash::make('12345678'),
                'fullname'=>'Admin baba',
                'username'=>'admin',
                'email'=>'admin@admin.com',
                'type'=>'admin',
                'bloodgroup'=>'A+',
                'gender'=>'male',
            ),
           
        );

        DB::table('users')->insert($data);
    }
}
