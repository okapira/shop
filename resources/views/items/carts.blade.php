@extends('layouts.app')

@section('content')
   <div class="row">
      <div class="col-sm-8">
         {{--  商品一覧 --}}
         @include('items.index')
      </div>
      {{-- カート追加ボタン --}}
      @include('item_cart.cart_button')
      {{-- カート削除ボタン --}}
      @include('item_cart.uncart_button')
</div>
@endsection