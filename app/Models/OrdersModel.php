<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    use HasFactory;
    protected $table = 'orders'; // Specify the table name
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'grand_total', 
        'payment_method',
        'payment_status',
        'transaction_id',
        'payment_reference_id',
        'delivery_status',
        'shipment_status',
        'shipment_no',
        'coupons',
        'order_note',
        'status', 
    ];
}
