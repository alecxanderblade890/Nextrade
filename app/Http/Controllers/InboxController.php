<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function showInbox(Request $request)
    {
        return view('pages.inbox');
    }
}
