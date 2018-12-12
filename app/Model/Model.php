<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as M;

class Model extends M
{

    public $timestamps = false;

    protected $fillable = ['name','productor_id','image','description','unit'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
