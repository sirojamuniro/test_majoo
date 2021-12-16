<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use DB;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->truncate();

        $transactions = [
        array('id'=>1, 'merchant_id'=>1, 'outlet_id'=>1, 'bill_total'=>2000, 'created_by'=>1,'updated_by'=>1, 'created_at'=>'2021-11-01 12:30:04', 'updated_at'=>'2021-11-01 12:30:04'),
        array('id'=>2, 'merchant_id'=>1, 'outlet_id'=>1, 'bill_total'=>2500,'created_by'=> 1, 'updated_by'=>1, 'created_at'=>'2021-11-01 17:20:14', 'updated_at'=>'2021-11-01 17:20:14'),
        array('id'=>3, 'merchant_id'=>1, 'outlet_id'=>1, 'bill_total'=>4000,'created_by'=> 1, 'updated_by'=>1, 'created_at'=>'2021-11-02 12:30:04', 'updated_at'=>'2021-11-02 12:30:04'),
        array('id'=>4, 'merchant_id'=>1, 'outlet_id'=>1, 'bill_total'=>1000,'created_by'=> 1, 'updated_by'=>1, 'created_at'=>'2021-11-04 12:30:04', 'updated_at'=>'2021-11-04 12:30:04'),
        array('id'=>5, 'merchant_id'=>1, 'outlet_id'=>1, 'bill_total'=>7000, 'created_by'=>1, 'updated_by'=>1, 'created_at'=>'2021-11-05 16:59:30', 'updated_at'=>'2021-11-05 16:59:30'),
        array('id'=>6, 'merchant_id'=>1, 'outlet_id'=>3, 'bill_total'=>2000, 'created_by'=>1, 'updated_by'=>1, 'created_at'=>'2021-11-02 18:30:04','updated_at'=> '2021-11-02 18:30:04'),
        array('id'=>7, 'merchant_id'=>1, 'outlet_id'=>3, 'bill_total'=>2500, 'created_by'=>1, 'updated_by'=>1, 'created_at'=>'2021-11-03 17:20:14', 'updated_at'=>'2021-11-03 17:20:14'),
        array('id'=>8, 'merchant_id'=>1, 'outlet_id'=>3, 'bill_total'=>4000, 'created_by'=>1, 'updated_by'=>1, 'created_at'=>'2021-11-04 12:30:04', 'updated_at'=>'2021-11-04 12:30:04'),
        array('id'=>9, 'merchant_id'=>1, 'outlet_id'=>3, 'bill_total'=>1000, 'created_by'=>1, 'updated_by'=>1, 'created_at'=>'2021-11-04 12:31:04', 'updated_at'=>'2021-11-04 12:31:04'),
        array('id'=>10, 'merchant_id'=>1, 'outlet_id'=>3, 'bill_total'=>7000, 'created_by'=>1, 'updated_by'=>1, 'created_at'=>'2021-11-05 16:59:30', 'updated_at'=>'2021-11-05 16:59:30'),
        array('id'=>11, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>2000,'created_by'=> 2, 'updated_by'=>2, 'created_at'=>'2021-11-01 18:30:04', 'updated_at'=>'2021-11-01 18:30:04'),
        array('id'=>12, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>2500, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-02 17:20:14', 'updated_at'=>'2021-11-02 17:20:14'),
        array('id'=>13, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>4000,'created_by'=> 2, 'updated_by'=>2, 'created_at'=>'2021-11-03 12:30:04', 'updated_at'=>'2021-11-03 12:30:04'),
        array('id'=>14, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>1000,'created_by'=> 2, 'updated_by'=>2, 'created_at'=>'2021-11-04 12:31:04', 'updated_at'=>'2021-11-04 12:31:04'),
        array('id'=>15, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>7000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-05 16:59:30', 'updated_at'=>'2021-11-05 16:59:30'),
        array('id'=>16, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>2000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-05 18:30:04', 'updated_at'=>'2021-11-05 18:30:04'),
        array('id'=>17, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>2500, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-06 17:20:14', 'updated_at'=>'2021-11-06 17:20:14'),
        array('id'=>18, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>4000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-07 12:30:04', 'updated_at'=>'2021-11-07 12:30:04'),
        array('id'=>19, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>1000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-08 12:31:04', 'updated_at'=>'2021-11-08 12:31:04'),
        array('id'=>20, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>7000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-09 16:59:30', 'updated_at'=>'2021-11-09 16:59:30'),
        array('id'=>21, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>1000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-10 12:31:04', 'updated_at'=>'2021-11-10 12:31:04'),
        array('id'=>22, 'merchant_id'=>2, 'outlet_id'=>2, 'bill_total'=>7000, 'created_by'=>2, 'updated_by'=>2, 'created_at'=>'2021-11-11 16:59:30', 'updated_at'=>'2021-11-11 16:59:30')
        ];
        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}
