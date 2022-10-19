
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    //ログインしていないときはログイン画面へ遷移させる。20221010_KojiYoshida
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
            $items = Item::where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();
            $type = Item::TYPE;
            return view('home.home', compact('items', 'type'));
}
    //
}

