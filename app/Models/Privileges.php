<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Privileges extends Pivot
{
    use HasFactory;

    protected $table = 'privileges';

    protected $primaryKey = 'id';

    protected $fillable = ['user_rol_id', 'permission_id'];
}
