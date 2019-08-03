<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilgan extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim','hasil','idTest'
    ];//

}
