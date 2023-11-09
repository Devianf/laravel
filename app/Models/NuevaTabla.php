<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NuevaTabla extends Model
{
    use HasFactory;

    protected $table = 'nueva_tabla'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'product_id',
        'image_url',
    ];

    // Otras propiedades y relaciones si es necesario
}