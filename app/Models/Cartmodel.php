<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Cartmodel extends Model
{
    use HasFactory; 
    protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id', 'product_id','quantity'];  


        


    // public function fruits()
    // {
    //     return $this->hasMany(FruitsModel::class);
    // }

      

       
        // for cart  
        public function fruit(): BelongsTo
        { 
         // return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
            return $this->belongsTo(FruitsModel::class, 'product_id', 'id');
        }



}
  