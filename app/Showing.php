<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Showing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'show_time', 'movie_id'
    ];

    /**
     * Eloquent relationship movie_id FK
     * @return Relationship
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
