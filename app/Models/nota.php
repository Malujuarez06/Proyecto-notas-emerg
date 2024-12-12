<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos (opcional si se sigue la convención de Laravel)
    protected $table = 'notas';

    // Los campos que son asignables de manera masiva (para proteger contra asignación masiva)
    protected $fillable = [
        'titulo',
        'contenido',
        'imagen',
    ];

    // Si usas un campo de fecha y hora para crear y actualizar (por defecto Laravel maneja created_at y updated_at)
    public $timestamps = true;

    // Si deseas manejar los campos de fecha de otra forma, puedes especificar su formato:
    // protected $dates = ['created_at', 'updated_at'];

    // Si el nombre de la columna de la imagen es diferente, la puedes especificar así:
    // protected $imageColumn = 'ruta_imagen';

    // Si deseas agregar un mutador o accesor para el campo de imagen (por ejemplo, obtener la URL completa de la imagen):
    public function getImagenUrlAttribute()
    {
return $this->imagen ? asset('storage/' . $this->imagen) : null;
}
}