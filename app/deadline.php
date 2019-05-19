<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deadline extends Model
{
    protected $table = 'deadline';
    protected $fillable = ['nama','tanggal','status'];
}
