<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class TransactionsModel extends Model
{
    use HasFactory;
    protected $table = 'transactions'; // Specify the table name
    protected $fillable = [
        'user_id',
        'payment_stats',
        'razorpay_response',
        'status'
    ];  
}
