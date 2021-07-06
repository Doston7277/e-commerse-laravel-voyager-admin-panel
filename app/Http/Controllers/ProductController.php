<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Menu_Item;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Post;
class ProductController extends Controller
{
    public function comment(Request $req){

        $id = $req->get('product_id');
        $setting = Setting::All();
        $product_det = Product::All()->where('id', $id);
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        $comment = new Comment([
            'product_id' => $req->get('product_id'),
            'comment' => $req->get('comment'),
        ]);

        $comment->save();
        return view('frontend.product_det', [ 'product_dets' => $product_det, 'settings' => $setting, 'menus' => $menu_item ]);
    }
}
