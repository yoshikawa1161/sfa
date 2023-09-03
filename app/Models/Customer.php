<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kana_name', 'address', 'lat', 'lng', 'mail_address', 'phone_number', 'key_person', 'memo', 'img_path'];
}
