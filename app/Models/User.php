<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasTeams;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasTeams;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    // protected $keyType = 'integer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identity_card',
        'name',
        'last_name',
        'date_of_birth',
        'sex',
        'phone_number',
        'address',
        'occupation',
        'email',
        'password',
        
        'marital_status_id',
        'user_rol_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    //protected $dateFormat = 'U';

    /** 
     * If you need to customize the names of the columns used to store the timestamps,
     * you may define CREATED_AT and UPDATED_AT constants on your model
     * 
     * @var string
    */
    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'updated_date';

    /**
     * The database connection that should be used for this particular model.
     *
     * @var string
     */
    //protected $connection = 'sqlite';


    /**
     * Gets the marital status for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maritalStatus(): BelongsTo
    {
        return $this->belongsTo(\App\Models\MaritalStatus::class, 'marital_status_id', 'id');
    }

    /**
     * Gets the rol the User owns
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userRol(): BelongsTo
    {
        return $this->belongsTo(\App\Models\UserRoles::class, 'user_rol_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}