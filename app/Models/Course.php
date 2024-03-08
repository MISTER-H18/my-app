<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Course extends Model
{
Use Hasfactory;

Protected $table='course';

Protected $primaryKey='id';

Protected $fillable = [
'course_name',
'teacher_id',
'description',
'start_date', 
'end_date',
'image',
'state',
];

}
