<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function inactive()
{
    $items = Item::where('status', 'inactive')->get();

    return view('items.inactive', compact('items'));
}

}
