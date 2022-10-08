<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class HomeController extends Controller
{
    public function index()
    {
        $items = Item::where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();
        $type = Item::TYPE;
        return view('home.home', compact('items', 'type'));
    }

    //
}

