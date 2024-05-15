<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Schema;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $user = User::where('email','admin@gmail.com')->first();
        if($user == null)
        {
            DB::table("users")->insert([
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin'),
                'user_group_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
       
       
            DB::table("users")->insert([
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('user'),
                'user_group_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        
         

          
         
    }
    }
}
