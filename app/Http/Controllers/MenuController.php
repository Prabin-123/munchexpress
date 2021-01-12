<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Rules\RestoCategoryValidation;

class MenuController extends Controller
{
    public function addMenuItem(Request $request){
        $postData = $this->validate($request, [
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required|min:3',
            'category' => ['required', new RestoCategoryValidation(request('restoId'))],
        ]);
        
        // return $request->all();

        $category = Category::where('resto_id', $postData['restoId'])->where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'resto_id' => $postData['restoId'],
            'category_id' => $category->id,
        ]);
        return response()->json($menu, 201);
    }
}
