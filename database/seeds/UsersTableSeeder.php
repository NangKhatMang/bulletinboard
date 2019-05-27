<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([
            'name'      =>  'Admin',
            'email'     =>  'admin@gmail.com',
            'password'  =>  bcrypt('password'),
            'profile'   =>  'admin',
            'type'      =>  '0',
            'phone'     =>  '09458987534',
            'address'   =>  'Kamayut Township, Yangon',
            'dob'       =>  '1995/5/5',
            'create_user_id' => '1',
            'updated_user_id' => '1',
        ]);
    }
}
