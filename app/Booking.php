<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Booking extends Model
{

    /**
     * Eloquent relationship pivot table    this model is not required
     * @return Relationship
     */
    public function customers()
    {
      return $this->belongsToMany(Customer::class)
            ->withTimestamps()
            ->withPivot('seats');
    }

}
