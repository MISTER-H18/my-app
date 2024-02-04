<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

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
    protected $keyType = 'integer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identity_card',
        'first_name',
        // 'middle_name',
        'last_name',
        // 'second_last_name',
        'date_of_birth',
        'sex',
        'phone_number',
        'address',
        'email',
        'password',

        'marital_status_id',
        'occupation_id'
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
     * Get the phone number that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function phoneNumber(): BelongsTo
    // {
    //     return $this->belongsTo(\App\Models\phoneNumber::class, 'id', 'phone_number_id', 'id');
    // }

    /**
     * Get the marital status that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function martialStatus(): BelongsTo
    {
        return $this->belongsTo(\App\Models\MartialStatus::class, 'marital_status_id', 'id');
    }

    /**
     * Get the occupation that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occupation(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Occupation::class, 'occupation_id', 'id');
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
