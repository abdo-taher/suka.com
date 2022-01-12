<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class vendor extends model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'address',
        'logo',
        'mobile',
        'category_id',
        'active',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'category_id',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeActive($query){
        return $query ->where('active',1);
    }
    public function getlogoAttribute($val){
        return ($val !== null) ? asset( 'assets/' . $val ) : "" ;
    }
    public function scopeSelection($query){
        return  $query->select()->get();
    }
    // category relation
    public function category()
    {
        return  $this -> belongsTo('App\Models\Dashbord\mainCategorie','category_id','id');
    }
    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }


}

