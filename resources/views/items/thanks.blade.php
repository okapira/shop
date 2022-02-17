@extends('layouts.app')

@section('content')
   <h1>ご購入ありがとうございました</h1>
   {{-- 商品一覧ページへのリンク --}}
   {!! link_to_route('items.index', '商品一覧に戻る', [], ['class' => 'btn btn-primary']) !!}
@endsection