<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'nombre_actividad',
        'descripcion',
        'ruta_archivo'
    ];

    /**
     * Get the course that this activity belongs to.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}