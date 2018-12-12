<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ModelImage extends Model
{
    public $timestamps = false;
    protected $fillable = ['model_id','image_id'];
}
