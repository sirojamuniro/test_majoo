<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            ['id'=>1 ,'name'=>'Admin 1', 'user_name'=>'admin1', 'password'=>bcrypt('admin1'), 'created_by'=>1, 'updated_by'=>1, 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>2, 'name'=>'Admin 2', 'user_name'=>'admin2', 'password'=>bcrypt('admin2'), 'created_by'=>2, 'updated_by'=>2, 'created_at'=>now(), 'updated_at'=>now()],

        ];
        foreach ($users as $user) {
            User::create($user);
        }

    }
}
