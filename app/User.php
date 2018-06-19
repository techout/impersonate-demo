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

    public function posts(){
        return $this->hasMany('App\Post');
    }

    // impersonate test
    public function canImpersonate(){
        return ($this->is_superAdmin() || $this->is_admin());
    }

    public function canBeImpersonated(){
        return !($this->is_superAdmin());
    }

    public static function allImpersonatable(){
        return User::where([
                ['type_id', '!=', '1'],
                ['id', '!=', Auth::id()]
            ])->get();
    }

    public function is_superAdmin(){
        return $this->type_id == '1';
    }

    public function is_admin(){
        return $this->type_id == '2';
    }


}
