<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailMail;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Menu_Item;

class MailController extends Controller
{
    public function sendEmail(Request $req){
        //return $req;
        $details = [
            'name' => $req->Name,
            'email' => $req->Email,
            'phone' => $req->Phone,
            'message' => $req->Message
        ];
        Mail::to("doston.3401@gmail.com")->send(new GmailMail($details));
        $setting = Setting::All();
        $menu_id = Menu::All()->where('name', 'site');
        $id = $menu_id['1']['id'];
        $menu_item = Menu_Item::All()->where('menu_id', $id);
        return view('frontend.contact', ['menus' => $menu_item, 'settings' => $setting]);
    }
}
