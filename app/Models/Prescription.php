<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table= 'prescriptions';

    protected $fillable= [
        'indicaciones',
        'medicine_id',
        'user_id'

    ];

    public function medicines(){
        return $this->belongsTo(Medicine::class, 'medicine_id');

}
    public function doctors(){
        return $this->belongsTo(User::class, 'user_id');

}

}
