<?php

namespace App\Models\Dashbord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use Translatable;

    protected $with= ['translations'];
    protected  $translatedAttributes = ['name'];
    protected $fillable = [
        'product_id',
        'attribute_id',
        'price'
    ];
    protected $hidden =['translations'];
    public function product(){
        return $this ->belongsTo(Product::class,'product_id');
    }
    public function attribute(){
        return $this ->belongsTo(Attribute::class,'attribute_id');
    }
}
