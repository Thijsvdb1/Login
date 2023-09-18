<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


     protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
