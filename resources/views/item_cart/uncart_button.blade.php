{{-- カートから削除ボタンのフォーム --}}
{!! Form::open(['route' => ['carts.remove', $item->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class' => "btn btn-danger btn-block"]) !!}
{!! Form::close() !!}