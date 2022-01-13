<?php

namespace App\Models\Dashbord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable ;
    protected $with = ['translations'];
    protected  $translatedAttributes =['name'];

    protected $fillable = [
        'parent_id',
        'slug',
        'is_active'
    ];

    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean',
        ];
    public function scopeParent($query){
        return $query -> whereNull('parent_id');
    }
    public function  scopeChild($query){
        return $query -> whereNotNull('parent_id');
    }
    public function getActive(){
        return $this -> is_active == 0 ? __('admin/all.active') : __('admin/all.active');
    }
    public function scopeActive($query){
        return $query -> where('is_active',1);
    }
        //    relation
    public function parent(){
        return $this -> belongsTo(self::class , 'parent_id');
    }
    public function child(){
        return $this ->hasMany('product','product_categories');
    }
    public function products(){
        return $this -> belongsToMany(Product::class , 'product_category');
    }

}
