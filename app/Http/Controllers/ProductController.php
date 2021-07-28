<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Menu_Item;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Post;
use Cart;
class ProductController extends Controller
{
    public function store(Request $req){
        Cart::add($req->get('product_id'), $req->get('product_name'), 1, $req->get('product_price'))->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect('product');
    }

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
        $comm = Comment::All()->where('product_id', $req->get('product_id'));

        return view('frontend.product_det', [ 'product_dets' => $product_det, 'settings' => $setting, 'menus' => $menu_item, 'comments' => $comm ]);
    }
}
