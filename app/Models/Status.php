<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class Status extends Model
{
    use Notifiable, HasRoles;

    /**
     * Set the default guard for this model.
     *
     * @var string
     */
    protected $fillable = [
        'name','status' ,
    ];
}
