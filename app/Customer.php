<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Showing;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    public function showings()
    {
      return $this->belongsToMany(Showing::class)
            ->withTimestamps()
            ->withPivot('seats');
    }
}
