<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['user_id'];
    public $timestamps = false;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }


}
