<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    protected $fillable = ['title','description','image','productor_id','prev_transformation_id','type','model_id'];
    public $timestamps = false;

    public function model() {
        return $this->belongsTo(\App\Model\Model::class);
    }
}
