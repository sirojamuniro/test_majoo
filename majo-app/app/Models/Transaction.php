<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DB;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'transactions';

    protected $hidden = [
        'created_at', 'updated_at','created_by','updated_by'
    ];


    public function outlets() {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function merchant() {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    public function total_omzet_merchant_day() {

        $userId = auth()->user()->id;
        $merchantId= Merchant::where('user_id',$userId)->first();
        $from =new Carbon('first day of November 2021');
        $to = new Carbon('last day of November 2021');
        $transaction = $this->with(['merchant.user'])->whereBetween('created_at', [$from, $to])
        ->where('merchant_id',$merchantId->id)
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d');
        });


        $usermcount = [];
        $userArr = [];
        $sum = 0;

        foreach($transaction as $key =>$value){
           foreach($value as $val){

               $sum += $val['bill_total'];

               $usermcount[(float)$key] = array_sum([$sum]);

           }

        }
        $day = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
        $merchant_name = $merchantId->merchant_name;
        for ($i=1; $i<=30;$i++){
            if(!empty($usermcount[$i])){
            $userArr[$i]['omzet'] = $usermcount[$i];

        }else{
            $userArr[$i]['omzet'] = 0;

        }
        $userArr[$i]['day']=$day[$i-1];
        $userArr[$i]['merchant_name']=$merchant_name;

        }

        return $userArr;

    }

    public function total_omzet_outlet_day() {

        $userId = auth()->user()->id;
        $merchantId= Merchant::where('user_id',$userId)->first();
        $outlet = Outlet::where('merchant_id',$merchantId->id)->get();
        $outletId = $outlet->pluck('id');
        $outletName = $outlet->pluck('outlet_name');
        $from =new Carbon('first day of November 2021');
        $to = new Carbon('last day of November 2021');
        $transaction = $this->with(['merchant.user'])
        ->whereIn('outlet_id',[$outletId])
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d');
        });

        $usermcount = [];
        $userArr = [];
        $sum = 0;

        foreach($transaction as $key =>$value){
           foreach($value as $val){
                $merchant = $val->merchant_name;
               $sum += $val['bill_total'];

               $usermcount[(float)$key] = array_sum([$sum]);

           }

        }
        $day = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
        $merchant_name = $merchantId->merchant_name;
        $outlet_name = $outletName;
        $outlet_id = $outletId;
        for ($i=1; $i<=30;$i++){
            if(!empty($usermcount[$i])){
            $userArr[$i]['omzet'] = $usermcount[$i];

        }else{
            $userArr[$i]['omzet'] = 0;

        }
        $userArr[$i]['day']=$day[$i-1];
        $userArr[$i]['merchant_name']=$merchant_name;
        $userArr[$i]['outlet_name']=$outlet_name;
        $userArr[$i]['outlet_id']=$outlet_id;
        }


        return $userArr;

    }
    public function total_per_day() {

        $userId = auth()->user()->id;
        $merchantId= Merchant::where('user_id',$userId)->first();
        $from =new Carbon('first day of November 2021');
        $to = new Carbon('last day of November 2021');
        $result = $this->join('merchants','merchants.id','=','transactions.merchant_id')
                    ->join('users','users.id','=','merchants.user_id')
                    ->selectRaw('transactions.*,users.name,merchants.merchant_name
                    (SELECT day(created_at) FROM transactions as day )
                    ')->get();

        // $datas->map(function($data) use($merchantId){
        //     $data->amount_day = $data->sum('bill_total')->groupBy('day')->get();
        // });

        return $result;

    }
    protected function sumArray($array)
    {

        $sum = array_reduce($array, function($carry, $item)
        {
            return (int)$carry + (int)$item->bill_total;
        });

        return $sum;
    }



}
