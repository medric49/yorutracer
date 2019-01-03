<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    protected $fillable = ['title','description','image','productor_id','prev_transformation_id','type','model_id','unit'];
    public $timestamps = false;

    public function model() {
        return $this->belongsTo(\App\Model\Model::class);
    }
    public function images() {
        return $this->hasMany(Image::class);
    }

    public function nextTransformations() {
        return $this->hasMany(Transformation::class,'prev_transformation_id','id');
    }
}
