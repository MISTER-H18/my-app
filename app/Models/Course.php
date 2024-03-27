<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Hasfactory;

    protected $table = 'course';

    protected $primaryKey = 'id';

    protected $fillable = [
        'course_name',
        'teacher_id',
        'description',
        'start_date',
        'end_date',
        'image',
        'state',
    ];
}
