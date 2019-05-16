<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    protected $fillable = ['nim_caslab','nama','keputusan','karakter','microteaching','komunikasi'];
}
