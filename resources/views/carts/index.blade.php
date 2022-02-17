@extends('layouts.app')

@section('content')

    <h1>カート内一覧</h1>

    @if ($items->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>値段</th>
                    <th>商品画像</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{!! link_to_route('items.show', $item->name, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->image }}</td>
                    {{-- カート追加／解除ボタン --}}
                    <td>@include('item_cart.uncart_button')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- 購入確定ページへのリンク --}}
        {!! link_to_route('items.thanks', 'ご注文を確定', ['item' => $item->id], ['class' => 'btn btn-light']) !!}
    @else
    
        <p>カートに商品はありません。<p>
    
    @endif

@endsection