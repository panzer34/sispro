<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table= 'appointments';

    protected $fillable= [
        'numero',
        'status',
        'user_id',
        'specialty_id',
        'consulta'
        

    ];

    public function doctors(){
        return $this->belongsTo(User::class, 'user_id');

}

public function specialties(){
    return $this->belongsTo(Specialty::class, 'specialty_id');

}



}
