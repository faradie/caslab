<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soaltes extends Model
{
    protected $primaryKey ="id";
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','pertanyaan','kunci_jwb','id_tes_fk'];
}
