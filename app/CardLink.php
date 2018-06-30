<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardLink extends Model
{
    protected $table = "cardLinks";

    public function card(){
        return $this->belongsTo('App\Card');
    }
}
