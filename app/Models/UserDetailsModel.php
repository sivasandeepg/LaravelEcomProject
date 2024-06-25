<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'user_details'; // Specify the table name
    protected $fillable = [
    'user_id', 
    'first_name',
    'last_name',
    'company_name',
    'address',
    'town_city',
    'country',
    'post_code',
    'contact_mobile',
    'email', 
    ]  ;
}
