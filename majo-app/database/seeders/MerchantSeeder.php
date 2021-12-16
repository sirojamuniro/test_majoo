<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;
use DB;


class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->truncate();

        $merchants = [
            ['id'=> 1, 'user_id'=>1, 'merchant_name'=>'merchant 1', 'created_by'=>1, 'updated_by'=>1, 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=> 2, 'user_id'=>2, 'merchant_name'=>'merchant 2', 'created_by'=>2, 'updated_by'=>2, 'created_at'=>now(), 'updated_at'=>now()],

        ];
        foreach ($merchants as $merchant) {
            Merchant::create($merchant);
        }
    }
}
