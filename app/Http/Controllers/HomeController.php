<?php

namespace App\Http\Controllers;

use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::with('user')->get();

        return view('pages.home', compact('items'));
    }
}
