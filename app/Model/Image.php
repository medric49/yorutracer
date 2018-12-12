<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file_name','transformation_id'];

    public function transformation() {
        return $this->belongsTo(Transformation::class);
    }
}
