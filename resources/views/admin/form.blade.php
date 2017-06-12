@extends('admin.core')

@section('content')

    {!! Form::open(['url' => route($create)]) !!}

    @foreach($fields as $field)

        {{ Form::label($field['key'], trans('app.language_code')) }}

        @if($field['type'] == 'single_line')

            {{ Form::text($field['key']) }}

        @elseif ($field['type'] == 'drop_down')

            {!! Form::select($field['key'], $field['options'] ) !!}

        @endif
    @endforeach

    {!! Form::submit('Click Me!') !!}
    {!! Form::close() !!}
@endsection