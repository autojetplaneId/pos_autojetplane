<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $table = 'identitas';

    public function users()
    {
        return $this->hasOne('App\User');
    }
}
