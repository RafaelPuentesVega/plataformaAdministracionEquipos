<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $table = "cliente";
    protected $fillable =[

        'cliente_documento',
        'cliente_tipo',
        'cliente_nombres',
        'cliente_correo',
        'cliente_direccion',
        'cliente_celular',
        'cliente_telefono',
        'departamento_id',
        'municipio_id',
        'cliente_estado'
];

}
