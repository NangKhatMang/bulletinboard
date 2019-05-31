<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        //admin account seeding
        DB::table('users')->insert([
            'name'      =>  'Admin',
            'email'     =>  'admin@gmail.com',
            'password'  =>  bcrypt('12345'),
            'profile'   =>  'admin',
            'type'      =>  '0',
            'phone'     =>  '09458987534',
            'address'   =>  'Kamayut Township, Yangon',
            'dob'       =>  '1995/5/5',
            'create_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //User account seeding
        DB::table('users')->insert([
            'name'      =>  'User1',
            'email'     =>  'user1@gmail.com',
            'password'  =>  bcrypt('12345'),
            'profile'   =>  'user',
            'phone'     =>  '09895624568',
            'address'   =>  'Ahlone Township, Yangon',
            'dob'       =>  '1995/5/5',
            'create_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        
        //user1 post seed
        DB::table('posts')->insert([
            'title'     =>  "This is User's post",
            'description' =>  "This is user1's post 1 description.",
            'create_user_id' =>  '2',
            'updated_user_id' =>  '2',
        ]);
        //admin post seed
        DB::table('posts')->insert([
            'title'     =>  "This is Admin's post",
            'description' =>  "This is admin's post 1 description.",
            'create_user_id' =>  '1',
            'updated_user_id' =>  '1',
        ]);
        */

        //faker post 150 create
        factory(App\Models\Post::class, 150)->create();
    }
}
