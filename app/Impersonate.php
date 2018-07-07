<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Impersonate extends Model
{
    const MAX = 5;

    public function ImpersonatedUser(){
        return $this->belongsTo('App\User', 'imp_user_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function recentImpersonates(){
        $manager = app('impersonate');
        $user_id = Auth::id();

        if($manager->isImpersonating()) $user_id = $manager->getImpersonatorId();

        return Impersonate::where('user_id', '=', $user_id)->with('ImpersonatedUser')->orderBy('updated_at', 'DESC')->get();
    }
}
