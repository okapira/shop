@extends('layouts.app')

@section('content')

    <h1>{{ $item->name }}の商品編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('image', '商品画像:') !!}
                    {!! Form::text('image', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', '商品名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', '値段:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection