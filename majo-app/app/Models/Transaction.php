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
        $result = $this->with(['merchant.user'])->whereBetween('created_at', [$from, $to])
        ->where('merchant_id',$merchantId->id)
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d');
        });

        // $datas->map(function($data) use($merchantId){
        //     $data->amount_day = $data->sum('bill_total')->groupBy('day')->get();
        // });

        return $result;

    }

    public function total_omzet_outlet_day() {

        $userId = auth()->user()->id;
        $merchantId= Merchant::where('user_id',$userId)->first();
        $outlet = Outlet::where('merchant_id',$merchantId->id)->get();
        $outletId = $outlet->pluck('id');
        $from =new Carbon('first day of November 2021');
        $to = new Carbon('last day of November 2021');
        $result = $this->with(['merchant.user'])->whereBetween('created_at', [$from, $to])
        ->whereIn('outlet_id',[$outletId])
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d');
        });

        // $datas->map(function($data) use($merchantId){
        //     $data->amount_day = $data->sum('bill_total')->groupBy('day')->get();
        // });

        return $result;

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


}
