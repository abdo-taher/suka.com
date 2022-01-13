<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'name',
        'permissions'
    ];
    public $timestamps = true;

    public function users(){
        $this->hasMany(User::class);
    }
    public function getPremissionsAttribute($permissions){
        return json_decode($permissions,true);
    }
}
