<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;

class CartsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // アイテム一覧を取得
        $user = \Auth::user();
        
        // ユーザーがカートに入れている商品を取得
        $items = $user->carts()->get();
        
        // dd($items);
        
        // アイテム一覧ビューでそれを表示
        return view('carts.index', [
            'items' => $items,
        ]);
    }
    
    /**
     * アイテムをカート追加するアクション。
     *
     * @param  $id  アイテムのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのアイテムをカート追加する
        \Auth::user()->cart($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * アイテムをカートから削除するアクション。
     *
     * @param  $id  アイテムのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのアイテムをカートから削除する
        \Auth::user()->uncart($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
