<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Booking extends Model
{
    //

    /**
     * Eloquent relationship pivot table
     * @return Relationship
     */
    public function books()
    {
      return $this->belongsToMany(Customer::class)
            ->withTimestamps()
            ->withPivot('seats');
    }

}
