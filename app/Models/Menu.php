<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Menu extends Model
{
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
