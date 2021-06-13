<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Item extends Model
{
    //protected $fillable = ['menu_id', 'title', 'url', 'target', 'icon_class', 'color', 'parend_id', 'order'];
    public $table = "menu_items";
}
