<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membership extends JetstreamMembership
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

}
