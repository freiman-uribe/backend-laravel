<?php
namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Docente extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['nombre', 'email', 'password'];

    protected $hidden = ['password'];

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'docente_materia');
    }
}