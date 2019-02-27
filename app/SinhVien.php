<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'tbl_sinhvien';
    protected $primaryKey = 'maSV';
    public $timestamps = false;
}
