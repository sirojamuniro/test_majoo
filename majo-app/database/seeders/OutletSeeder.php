<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;
use DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->truncate();

        $outlets = [
            array('id'=> 1, 'merchant_id'=>1, 'outlet_name'=>'Outlet 1', 'created_by'=>1, 'updated_by'=>1, 'created_at'=>now(), 'updated_at'=>now()),
            array('id'=> 2, 'merchant_id'=>2, 'outlet_name'=>'Outlet 1', 'created_by'=>2, 'updated_by'=>2, 'created_at'=>now(), 'updated_at'=>now()),
            array('id'=> 3, 'merchant_id'=>1, 'outlet_name'=>'Outlet 2', 'created_by'=>1, 'updated_by'=>1, 'created_at'=>now(), 'updated_at'=>now()),
        ];

        foreach ($outlets as $outlet) {
            Outlet::create($outlet);
        }
    }
}
