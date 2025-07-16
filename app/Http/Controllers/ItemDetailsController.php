<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemDetailsController extends Controller
{
    public function index($id)
    {
        $item = Item::findOrFail($id);
        return view('pages.item-details', compact('item'));
    }
}
