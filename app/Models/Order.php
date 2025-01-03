<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
protected $fillable=[
    'name',
    'address',
    'phone',
    'status',
    'user_id',
    'total',
];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function items()
    {
        return $this->hasMany(orderItems::class,'order_id');
    }
}
