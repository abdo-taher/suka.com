<?php

namespace App\Models\Dashbord;

use App\Observers\Dashbord\languages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = [
        'id',
        'abbr',
        'name',
        'locale',
        'active',
        'direction',
        'created_at',
        'updated_at',
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
     protected $hidden = [

     ];

    public function getActive(){
        return $this -> active  == 1 ? "Active" : "Inactive";
    }
    public function scopeActive($query){
        return $query ->where('active',1);
    }
    public function selectLang(){
        // return language::select('id','name','abbr','direction','locale','active')->get();
        return  DB::table('languages')->select('id','name','abbr','direction','locale','active')->get();
    }
    protected static function boot(){
        parent::boot();
        language::observe(languages::class);
    }
    public function mainCategorie(){
        return $this -> hasMany('App\Models\Dashbord\mainCategorie','lang_id' ,'id');
    }
    public function subCategorie(){
        return $this -> hasMany('App\Models\Dashbord\subcategorie','lang_id' ,'id');
    }


}
