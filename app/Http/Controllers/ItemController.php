<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

use App\Models\Post;

class ItemController extends Controller

{
        //ログインしていないときはログイン画面へ遷移させる。20221010_KojiYoshida
        public function __construct(){
            $this->middleware('auth');
        }

    /**
     * 一覧画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $type = Item::TYPE;
        return view('item.index', compact('items', 'type'));
    }

    /**
     * 登録画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Item::TYPE;
        return view('item.create', compact('type'));
    }

    /**
     * 新規登録機能
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'name' => 'required|max:100',
                'type' => 'required',
                'detail' => 'required|max:500'
            ],
            [
                'name.required' => '*商品名を入力してください',
                'name.max' => '*商品名は100文字以下で入力してください',
                'type.required' => '*種別を選択してください',
                'detail.required' => '*詳細を入力してください',
                'detail.max' => '*商品名は500文字以下で入力してください'
            ]
        );

        Item::create([
            'id' => 0,
            'user_id' => 1, //auth::id()
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail
        ]);

        return redirect('/item');
    }

    /**
     * 編集画面表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $type = Item::TYPE;
        return view('item.edit', compact('item','type'));
    }


    /**
     * 更新機能
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate(
            [
                'name' => 'required|max:100',
                'type' => 'required',
                'detail' => 'required|max:500'
            ],
            [
                'name.required' => '*商品名を入力してください',
                'name.max' => '*商品名は100文字以下で入力してください',
                'type.required' => '*種別を選択してください',
                'detail.required' => '*詳細を入力してください',
                'detail.max' => '*商品名は500文字以下で入力してください'
            ]
        );

        $update = [
            'user_id' => 1, //auth::id()
            'name' => $request->name,
            'status' => $request->status ?? "",
            'type' => $request->type,
            'detail' => $request->detail
        ];
        Item::where('id', $id)->update($update);
        return redirect('/item');
    }

    /**
     * 削除機能
     *
     * @param  int  $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Item::where('id', $id)->delete();
        return redirect('/item');
    }
}
