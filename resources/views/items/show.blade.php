@extends('layouts.app')

@section('content')

    <h1>id = {{ $item->id }} のメッセージ詳細ページ</h1>

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
    
    {{-- 商品編集ページへのリンク --}}
    {!! link_to_route('itams.edit', 'この商品を編集', ['item' => $item->id], ['class' => 'btn btn-light']) !!}
    
    {{-- 商品削除フォーム --}}
    {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
