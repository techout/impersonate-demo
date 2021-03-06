<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;

use Auth;

class User extends Authenticatable
{
    use Impersonate;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function impersonates(){
        return $this->hasMany('App\Impersonate');
    }

    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    /////////////////////////////////////////////
    // Impersonate functions
    /////////////////////////////////////////////
    public function is_superAdmin(){
        return $this->type_id == '1';
    }

    public function is_admin(){
        return $this->type_id == '2';
    }

    public function canImpersonate(){
        return ($this->is_superAdmin() || $this->is_admin());
    }

    public function canBeImpersonated(){
        return !($this->is_superAdmin());
    }

    public static function allImpersonatable(){
        return User::where([
                ['type_id', '!=', '1'],
                ['id', '!=', Auth::id()],
                ['id', '!=', app('impersonate')->getImpersonatorId()]
            ])->with('branch')->get();
    }

    /////////////////////////////////////////////
    // Permission functions
    /////////////////////////////////////////////
    public function hasPermission($name, $obj_id){
        return $this->permissions()->where([
                ['name', $name],
                ['obj_id', $obj_id]
            ])->first() != null;
    }
}
