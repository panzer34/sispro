<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cache;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'name',
        'sexo',
        'cedula',
        'address',
        'phone',
        'role',
        'status',
        'imagen'
       
        
    ];

   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeDoctors($query){
         return $query->where('role', 'doctor');
     }

     public function scopePatients($query){
        return $query->where('role', 'paciente');
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function isUserOnline(){
        return Cache::has('user-is-online' . $this->id);
    }

  
}
