<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class widgets extends Model
{
    protected $table = 'widgets';
    public $timestamps = false; 
    //use SoftDeletes;

    protected $fillable = [
        'name', 'desc' 
    ];
}
