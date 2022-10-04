<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
    public function index()
    {
        $data = Item::where('status', '=', 'active')->get();
        
        return view('Search.search',[
            'data' => $data,
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

        $query = Item::query();

        if(!empty($keyword))
        {
            $query->where('name','like','%'.$keyword.'%');
            $query->orWhere('type','like','%'.$keyword.'%');
        }

        $data = $query->orderBy('id','asc')->paginate(5);
        return view('Search.search')->with('data',$data)->with('keyword',$keyword);
    }


   
}
