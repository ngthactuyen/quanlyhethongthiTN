<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLy extends Model
{
    protected $table = 'tbl_quanly';
    protected $primaryKey = 'maQL';
    public $timestamps = false;
}
