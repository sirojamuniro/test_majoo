<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Carbon;
use DB;

class TransactionController extends Controller
{

    private $transaction;
    function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;

    }

    protected function transactionMerchantByDay()
    {
        // $date = Carbon::now()->startOfDay;

        //one month / 30 days
        // $date = Carbon::now()->subDays(30);
        // var_dump('ini from',$from);
        // var_dump($to);

        // $transaction = Transaction::select(DB::raw('day(created_at) as day'),'bill_total','merchant_id','id')->with(['merchant'])->whereBetween('created_at',[$from,$to])->where('merchant_id',$merchantId->id)->get();
        // $bill= Transaction::select('bill_total')->whereBetween('created_at',[$from,$to])->where('merchant_id',$merchantId->id)->get()->toArray();
        // var_dump($bill);
        // $group = $transaction->groupBy('day');
        // $group->map(function($trans) use ($bill,$transaction){
        //     // $trans->amount_day= $this->sumArray($transaction->bill_total);
        //     // $trans->groupDay = $trans->groupBy('day');
        //     $trans->amountDay =  $this->sumArray($bill);

        //     return $trans;
        // });

        // $result = $this->sumArray($bill);

        // $sum = array_reduce($array, function($carry, $item)
        // {
        //     return $carry + $item->commission;
        // });

        // $transaction= DB::table('transactions')->leftjoin('merchants','merchants.id','=','transactions.merchant_id')
        // ->leftjoin('users','users.id','=','merchants.user_id')
        // ->selectRaw('transactions.*,users.name,users.user_name,merchants.merchant_name,
        //             IF((SELECT day(created_at) FROM transactions WHERE created_at BETWEEN ' . $from . ' AND ' . $to . '), IS NOT NULL,1,0) as day)
        // ')->where('merchant_id',$merchantId->id)->get();
        // $result = Transaction::with(['merchant'])->whereBetween('created_at', [$from, $to])
        // ->where('merchant_id',$merchantId->id)->orderBy('created_at')
        // ->get()
        // ->groupBy(function ($val) {
        //     return Carbon::parse($val->created_at)->format('d');
        // });
        // $array = $this->sumArray($bill);

        $result = $this->transaction->total_omzet_merchant_day();
        // $result->map(function($res) {
        //     $res->amount_day = $res->sum('bill_total');

        //     return $res;
        // });

        // $total = Transaction::whereDate('created_at',[$from,$to])->where('merchant_id',$merchantId->id)->sum('bill_total');
        // ,DB::raw("strftime('%d', created_at) = '1'")
        // $items =Transaction::select(DB::raw('day(created_at) as day'),'bill_total','merchant_id','id')->with(['merchant'])->whereBetween('created_at',[$from,$to])->where('merchant_id',$merchantId->id)->orderBy('day')->get()->groupBy('day');
        // $result = [];
        // foreach($items as $key =>$value){
        //     $re['daily'][$value] = Transaction::where
        // }
        return  response()->json([
            'status'=>true,
            'message'=>'success',
            'data'=> $result,
            // 'omzet_per_day'=>$total
            // 'amount_day' => $this->sumArray($bill),

        ]);
    }

    protected function transactionOutletByDay()
    {


        $result = $this->transaction->total_omzet_outlet_day();

        return  response()->json([
            'status'=>true,
            'message'=>'success',
            'data'=> $result,
        ]);
    }

    protected function sumArray($array)
    {

        $sum = array_reduce($array, function($carry, $item)
        {
            var_dump($item);
            return (int)$carry + (int)$item->bill_total;
        });

        return $sum;
    }


}
