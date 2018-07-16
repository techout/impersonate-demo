<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }

    /////////////////////////////////////////////

    public function is_division(){

        //!! need logic for checking STO-#

        return strlen($this->symbol) == 3;
    }
}
