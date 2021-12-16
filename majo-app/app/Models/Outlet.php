<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'outlets';

    protected $hidden = [
        'created_at', 'updated_at','created_by','updated_by'
    ];


    public function merchant() {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    public function transaction() {
        return $this->hasMany(Transaction::class, 'outlet_id', 'id');
    }
}
