<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;

class UserController extends Controller
{

    protected function me()
    {
       $userId = auth()->user()->id;

       $result = User::where('id',$userId)->first();

       return $this->handleResponse(200, 'success',$result);
    }

    protected function myMerchant()
    {
       $userId = auth()->user()->id;

       $result = User::with('merchant')->where('id',$userId)->first();

       return $this->handleResponse(200, 'success',$result);
    }

    protected function myOutlet()
    {
       $userId = auth()->user()->id;

       $result = User::with('merchant.outlet')->where('id',$userId)->first();

       return $this->handleResponse(200, 'success',$result);
    }
}
