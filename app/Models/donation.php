<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class donation extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'monto',
        'tipo',
    ];
    public $timestamps = true;
    public function userID(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class,'id');
    }
}
