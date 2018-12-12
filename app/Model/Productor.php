<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    protected $fillable = ['user_id'];

    public $timestamps = false;

    public function created_products() {
        return $this->hasMany(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transformations() {
        return $this->hasMany(Transformation::class);
    }
    public function models() {
        return $this->hasMany(\App\Model\Model::class);
    }
}
