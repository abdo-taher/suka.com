<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_translation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'short_description'];
    public  $timestamps=false;
}
