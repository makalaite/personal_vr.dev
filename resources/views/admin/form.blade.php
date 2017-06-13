@extends('admin.core')

@section('content')
<h3>{{  $title  }} </h3>
    {!! Form::open(['url' => $route]) !!}

    @foreach($fields as $field)
        <br/>
        @if(isset($field['type'] == ))
        {{ Form::label($field['key'], trans('app.' . $field['key'])) }}

        @if($field['type'] == 'single_line')
<br/>
            {{ Form::text($field['key']) }}
<br/>
<br/>
        @elseif ($field['type'] == 'drop_down')

            {!! Form::select($field['key'], $field['options'] ) !!}

        @endif
    @endforeach

    {{ Form::submit('Patvirtinti'), array('class'=>'btn btn-success') }}
    {!! Form::close() !!}
@endsection