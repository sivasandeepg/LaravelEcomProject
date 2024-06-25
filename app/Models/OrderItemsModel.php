<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemsModel extends Model
{
    use HasFactory;
    protected $table = 'order_items'; // Specify the table name
    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'quantity',
        'price',
        'Status', 
    ]; 
}
