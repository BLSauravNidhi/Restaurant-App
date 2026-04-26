<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public $timestamps = false;

    public function tblsessions(){
        return $this->hasMany(TableSession::class);
    }

    public function tblrequests(){
        return $this->hasMany(TableSession::class);
    }
}
