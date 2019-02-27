<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonThi extends Model
{
    protected $table = 'tbl_monthi';
    protected $primaryKey = 'maMT';
    public $timestamps = false;
}
