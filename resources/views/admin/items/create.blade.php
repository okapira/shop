@extends('layouts.app')

@section('content')

    <h1>管理者用商品追加ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($item, ['route' => 'items.store']) !!}

                <div class="form-group">
                    {!! Form::label('image', '商品画像ＵＲＬ:') !!}
                    <!--<input type="file" name="example" accept="image/jpeg, image/png">-->
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

                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection