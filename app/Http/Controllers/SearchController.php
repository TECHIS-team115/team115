<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
        //ログインしていないときはログイン画面へ遷移させる。20221010_KojiYoshdia
        public function __construct(){
            $this->middleware('auth');
        }

    public function index()
    {
        $data = Item::where('status', '=', 'active')->paginate(5, ["*"], 'data-page');
        $type = Item::TYPE;
        return view('Search.search',[
            'data' => $data,
            'type' => $type,
        ]);
    }

    public function detailIndex(Request $request)
    {
        $item = Item::where('id', '=', $request->id)->first();

        return view('Search.detail')->with([
            'item' => $item,
        ]);
    }

    public function getIndex(Request $rq)
    {
        $keyword = $rq->input('keyword');
        $type = Item::TYPE;
        $query = Item::query();

        if(!empty($keyword))
        {
            $query->where('name','like','%'.$keyword.'%');
            $query->orWhere('type','like','%'.$keyword.'%');
        }

        $data = $query->orderBy('id','asc')->where('status', '=', 'active')->paginate(5, ["*"], 'data-page');
        return view('Search.search')->with('data',$data)->with('keyword',$keyword,)->with('type',$type,);
    }


   
}
