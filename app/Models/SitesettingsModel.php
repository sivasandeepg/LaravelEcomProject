<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitesettingsModel extends Model
{
    use HasFactory;
    protected $table = 'site_setting'; // Specify the table name
    protected $fillable = ['admin_email', 'admin_mobile', 'admin_address','meta_name', 'meta_keyword', 'copy_writer','terms&conditions','privacy_policy']  ;
}
