<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soaltes extends Model
{
    protected $fillable = ['pertanyaan','jawab_a','jawab_b','jawab_c','jawab_d','jawaban','nilai_id'];
}
