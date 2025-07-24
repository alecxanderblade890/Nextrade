<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\View;

class ItemDetailsController extends Controller
{
    public function index($id)
    {
        $item = Item::findOrFail($id);
        return view('pages.item-details', compact('item'));
    }
}
