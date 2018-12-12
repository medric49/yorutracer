<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransformationImage extends Model
{
    public $timestamps = false;
    protected $fillable = ['transformation_id','image_id'];
}
