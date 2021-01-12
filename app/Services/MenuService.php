<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMenuWithCategory($restoId)
    {
        $menuItems = Menu::where('resto_id', $restoId)->get()->groupBy('category.name');
        return $menuItems;
    }
}