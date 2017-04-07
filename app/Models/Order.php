<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
  
    protected $fillable = [
        'order_number',
        'transaction_date',
        'customer_id',
        'total_amount',
        'status',
    ];
}
