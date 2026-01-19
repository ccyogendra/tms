<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class Task extends Model
{
    use Notifiable, HasRoles;

    /**
     * Set the default guard for this model.
     *
     * @var string
     */

    protected $fillable = [
        'title','description' ,'start_date','due_date','status','assignee',
        'created_at','updated_at'
    ];
    protected $casts = [
        'start_date' => 'date',     // or 'datetime' if you need times
        'due_date'   => 'date',
      ];
}
