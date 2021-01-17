<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;

class Restaurant extends Model
{
    protected $guarded = [];

    protected $appends = ['slug', 'ordersSlug'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'resto_id');
    }

    public function getSlugAttribute()
    {
        return route('resto.menu', $this->id);
    }

    public function getOrdersSlugAttribute()
    {
        return route('resto.orders', $this->id);
    }
}
