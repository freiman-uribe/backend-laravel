<?php
namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'docente_materia');
    }
}