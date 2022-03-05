<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    protected $table = "repuesto";
    protected $fillable = [
        'id_repuesto',
        'id_orden_servicio_repuesto',
        'nombre_repuesto',
        'created_at_repuesto',
        'user_creation_repuesto',
        'valor_unitario_repuesto',
        'delete_at_repuesto',
        'valor_total_repuesto',
        'cantidad_repuesto'
    ];
    public $timestamps = false;
}
