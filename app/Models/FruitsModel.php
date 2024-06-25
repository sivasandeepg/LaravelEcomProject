<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class FruitsModel extends Model
{
    use HasFactory;
    protected $table = 'fruits'; // Specify the table name
    protected $fillable = ['fruit_name', 'stock',  'image','price_per_kg'];

  
 

    // public function cart()
    // {
    //     return $this->belongsTo(Cartmodel::class);
    // }
 

    } 