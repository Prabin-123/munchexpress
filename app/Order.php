<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\restaurant;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [
        'order_details' => 'json'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
}
