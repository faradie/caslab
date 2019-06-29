<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $primaryKey ="id";
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','soaltes_id','jawaban'];

    public function soaltes()
    {
        return $this->belongsTo('App\Soaltes');
    }
}
