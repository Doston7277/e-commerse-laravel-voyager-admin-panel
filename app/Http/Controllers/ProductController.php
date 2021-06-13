<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu_Item;
use App\Models\Menu;
use App\Models\Setting;

class ProductController extends Controller
{
    public function product_det($id){
        $setting = Setting::All();
        $product_det = Product::All()->where('id', $id);
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.product_det', [ 'product_det' => $product_det, 'settings' => $setting, 'menus' => $menu_item]);
    }
}
