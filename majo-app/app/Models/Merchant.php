<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'merchants';

    protected $hidden = [
        'created_at', 'updated_at','created_by','updated_by'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaction() {
        return $this->hasMany(Transaction::class,'merchant_id','id');
    }

}
