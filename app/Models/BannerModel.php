<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'banner_items'; // Specify the table name
    protected $fillable = ['name', 'title', 'description','banner_colour', 'font_style','image','status'];
}
