<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // アイテム一覧を取得
        $items = Item::all();
        
        // アイテム一覧ビューでそれを表示
        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でアイテムを検索して取得
        $item = Item::findOrFail($id);
        
        // アイテム詳細ビューでそれを表示
        return view('items.show', [
            'item' => $item,
        ]);
    }
    
        
    /**
     * ユーザのカート一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function carts($id)
    {
        // idの値でアイテムを検索して取得
        $item = Item::findOrFail($id);

        // 関係するモデルの件数をロード
        $item->loadRelationshipCounts();

        // ユーザのカート一覧を取得
        $item = $user->carts()->paginate();

        // カート一覧ビューでそれらを表示
        return view('items.carts', [
            'user' => $user,
            'item' => $item,
            'quantity' => $quantity,
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanks()
    {
        // 購入確定ページを表示
        return view('items.thanks');
    }
}