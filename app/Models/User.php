<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'iin',
        'number_identification',
        'issued_date_identification',
        'issued_organization',
        'expiring_date_identification',
        'number_order',//nomer prikaza
        'recruitment_date',
        'position_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function techminimums()
    {
        return $this->hasMany(Techminimum::class, 'user_id');
    }

    public function electrics()
    {
        return $this->hasMany(Electric::class, 'user_id');
    }

    public function earthens()
    {
        return $this->hasMany(Earthen::class, 'user_id');
    }

    public function crans()
    {
        return $this->hasMany(Cran::class, 'user_id');
    }

    public function capacities()
    {
        return $this->hasMany(Capacity::class, 'user_id');
    }

    public function firehazards()
    {
        return $this->hasMany(Firehazard::class, 'user_id');
    }

    public function firesaves()
    {
        return $this->hasMany(Firesafe::class, 'user_id');
    }

    public function gashazards()
    {
        return $this->hasMany(Gashazard::class, 'user_id');
    }

    public function labors()
    {
        return $this->hasMany(Labor::class, 'user_id');
    }

    public function methanols()
    {
        return $this->hasMany(Methanol::class, 'user_id');
    }

    public function pressurevessels()
    {
        return $this->hasMany(Pressurevessel::class, 'user_id');
    }
}
