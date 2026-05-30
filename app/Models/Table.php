<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function tblsessions(){
        return $this->hasMany(TableSession::class, 'table_number', 'table_number');
    }

    public function tblrequests(){
        return $this->hasMany(TableRequest::class);
    }
}
