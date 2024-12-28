<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // ID del usuario autenticado
        'date',    // Fecha de la reserva
        'time',    // Hora de la reserva
        'status',  // Estado de la reserva
    ];
}
