<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Cloudinary\Cloudinary;


class AddItemController extends Controller
{
    public function showAddItem(Request $request)
    {
        return view('pages.add-item');
    }

    public function addItem(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'exchange' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Increased to 10MB
        ]);
        
        if (!$request->hasFile('image')) {
            return back()->with('error', 'No image file was uploaded.');
        }
        
        if (!$request->file('image')->isValid()) {
            return back()->with('error', 'The uploaded file is not valid.');
        }

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);

        $result = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
            'folder' => 'users',
        ]);

        try {

            Item::create([
                'item_name' => $validatedData['title'],
                'description' => $validatedData['description'],
                'exchange_item_for' => $validatedData['exchange'],
                'image_url' => $result['secure_url'],
                'user_id' => Auth::user()->id
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }

        return redirect()->route('pages.home')->with('success', 'Item added successfully!');
    }
}
