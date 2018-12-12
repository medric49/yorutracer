<?php

namespace App;

use App\Model\Distributor;
use App\Model\Productor;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','logo','website','tel','type','longitude','latitude','public_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function productor() {
        return $this->hasOne(Productor::class);
    }

    public function distributor() {
        return $this->hasOne(Distributor::class);
    }
}
