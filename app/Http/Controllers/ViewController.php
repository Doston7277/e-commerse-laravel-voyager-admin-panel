<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu_Item;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Product;

class ViewController extends Controller
{
    // Frontend view
    public function index(){
        $setting = Setting::All();
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.index', ['menus' => $menu_item, 'settings' => $setting]);
    }
    public function about(){
        $setting = Setting::All();
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.about', ['menus' => $menu_item, 'settings' => $setting]);
    }
    public function blog(){
        $setting = Setting::All();
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.blog', ['menus' => $menu_item, 'settings' => $setting]);
    }
    public function contact(){
        $setting = Setting::All();
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.contact', ['menus' => $memenu_itemnu, 'settings' => $setting]);
    }
    public function product(){
        $setting = Setting::All();
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        $product = Product::All();
        return view('frontend.product', ['menus' => $menu_item, 'settings' => $setting, 'products' => $product]);
    }

    public function product_det($id){
        $setting = Setting::All();
        $product_det = Product::All()->where('id', $id);
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.product_det', [ 'product_dets' => $product_det, 'settings' => $setting, 'menus' => $menu_item]);
    }

}
