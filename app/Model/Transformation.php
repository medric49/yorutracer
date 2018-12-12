<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    protected $fillable = ['title','description','image','productor_id','model_id'];
    public $timestamps = false;
}
