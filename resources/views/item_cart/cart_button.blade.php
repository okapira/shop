{{-- カートに追加ボタンのフォーム --}}
{!! Form::open(['route' => ['carts.add', $item->id]]) !!}
    {!! Form::submit('カートに追加', ['class' => "btn btn-primary btn-block"]) !!}
{!! Form::close() !!}