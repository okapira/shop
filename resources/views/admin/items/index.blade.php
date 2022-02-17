@extends('layouts.app')

@section('content')

    <h1>商品一覧</h1>

    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>商品名</th>
                    <th>値段</th>
                    <th>商品画像</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{!! link_to_route('items.show', $item->id, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->image }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection