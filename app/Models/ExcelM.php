<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelM extends Model
{
    use HasFactory;
    protected $conection = "sqlsrv";
    protected $table = 'dbo._h_b_a';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = ['CATEGORIA', 'CODPRODUCTO', 'NOMPRODUCTO', 'PROVEEDORES', 'DOLARES', 
    'SOLES', 'VENTA', 'UTILIDAD', 'PROMOCION', 'STOCK', 'MARCA', 'URLP', 'URLI' ];
    
    public static function rules()
    {
        return [
            'CODPRODUCTO' => 'required|unique:_h_b_a,CODPRODUCTO',
            // Resto de las reglas de validación para los otros campos
        ];
    }
}
