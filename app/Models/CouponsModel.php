<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponsModel extends Model
{
    use HasFactory;
    protected $table = 'coupons'; // Specify the table name
    protected $fillable = ['name',
     'discount_code',
       'description',
       'discount_type',
       'valid_till_date',
       'offer_on_product_id',
       'status',
    ];
}
  