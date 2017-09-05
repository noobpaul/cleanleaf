<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
