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
        return true;
    }

    public function canBeImpersonated(){
        return true;
    }

    public static function getImpersonatable(){
        $r = User::where('id', '!=', Auth::id())->get();
        return $r;
    }
}
