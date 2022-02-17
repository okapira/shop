@extends('layouts.app')

@section('content')

    <h1>{{ $item->name }} の商品詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>商品画像</th>
            <td>{{ $item->image }}</td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>値段</th>
            <td>{{ $item->price }}</td>
        </tr>
    </table>

@endsection
