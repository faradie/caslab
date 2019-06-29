<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiTulis extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim','idSoal','hasil','idTest'
    ];//

    public function soaltes()
    {
        return $this->belongsTo('App\Soaltes');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
