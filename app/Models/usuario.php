<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usuarios';
    protected $fillable=[
        "nombre",
        "email",
        "password",
        "edad",
        "codigo_verificacion"
    ];
}
