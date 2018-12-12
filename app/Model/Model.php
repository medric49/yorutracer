<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as M;

class Model extends M
{

    public $timestamps = false;

    protected $fillable = ['name','productor_id'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function first_transformation() {
        return $this->hasMany(Transformation::class)->where('type','INITIAL')->first();
    }
}
