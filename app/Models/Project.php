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
        'active',
        'code',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


     protected $dates = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function projects()
    {
        return $this->belongsToMany(User::class);
    }
}
