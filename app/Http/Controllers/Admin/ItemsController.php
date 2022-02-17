<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Auth;

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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      
      // 管理者じゃない場合、トップページにリダイレクトする
      if(Auth::user()->is_admin == False) {
         return redirect("/");   
      }
      
      
      $item = new Item;
      
      // 商品作成ビューを表示
      return view('admin.items.create', [
         'item' => $item,
      ]);
      
      return redirect('/');
   }
   
   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
     // 商品追加
     $item = new Item;
     $item->image = $request->image;
     $item->name = $request->name;
     $item->price = $request->price;
     $item->save();
   
     // リターンバック
     return redirect('/');
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
      return view('admin.items.show', [
         'item' => $item,
      ]);
   }
   
   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      // idの値でアイテムを検索して取得
     $item = Item::findOrFail($id);
   
     // アイテム詳細ビューでそれを表示
     return view('admin.items.edit', [
         'item' => $item,
     ]);
   }
   
   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
     // idの値でアイテムを検索して取得
     $item = Item::findOrFail($id);
     // アイテムを更新
     $item->image = $request->image;
     $item->name = $request->name;
     $item->price = $request->price;
     $item->save();
   
     // リターンバック
     return redirect('/');
   }
   
   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      // idの値でアイテムを検索して取得
      $item = Item::findOrFail($id);
      // アイテムを削除
      $item->delete();
      
      // リターンバック
      return redirect('/');
   }
}
