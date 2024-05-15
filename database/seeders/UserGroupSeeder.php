<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\UserGroup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_group_array =
            [
                'Author',
                'User',
              
            ];

        foreach ($user_group_array as $key => $user_group_name) {

            $user_group_check = UserGroup::where('name', $user_group_name)->first();

            if ($user_group_check == null) {
                DB::table('user_groups')->insert(
                    [
                        'name' => $user_group_name,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ],
                );
            }
        }
    }
}
