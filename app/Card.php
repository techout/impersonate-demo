<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function cardLinks(){
        return $this->hasMany('App\CardLink');
    }
}
