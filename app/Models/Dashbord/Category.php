<?php

namespace App\Models\Dashbord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected  $translatedAttributes = ['name'];
    protected $table = 'categories';
    protected $fillable =['parent_id','slug','is active','image'];
    protected $hidden = ['translations'];
    protected $casts = ['is_active' => 'boolean'];


    public function scopeParent($query){
        return $query->whereNull('parent_id');
    }

    public function scopeChild($query){
        return $query->whereNotNull('parent_id');
    }
    public function getActive(){
        return $this -> is_active == 0 ? __('admin/category/main.active') : __('admin/category/main.inactive') ;
    }


    public function  scopeActive($query){
        return $query->where('is_active',1);
    }
    public function catChild(){
        $this ->hasMany(self::class,'parent_id');
    }
    public function  product(){
        $this ->belongsTo(Product::class,'product_categories');
    }

}
