<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ItemDetailsController extends Controller
{
    public function index($id)
    {
        $item = Item::findOrFail($id);
        return view('pages.item-details', compact('item'));
    }
    public function showMyItems()
    {
        $items = Item::where('user_id', Auth::user()->id)->get();
        return view('pages.my-items', compact('items'));
    }
    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('show.my.items')->with('success', 'Item deleted successfully');
    }
    public function editItem(Request $request, $id)
    {
        // $item = Item::findOrFail($id);
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required',
        //     'exchange' => 'nullable|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $item->update($request->all());
        // return redirect()->route('show.my.items')->with('success', 'Item updated successfully');
    }
}
