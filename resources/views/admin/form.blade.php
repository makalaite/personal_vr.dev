@extends('admin.core')

@section('content')
    <h3>{{  $title  }} </h3>
    {!! Form::open(['url' => $route]) !!}

    @foreach($fields as $field)
        <br/>
        {{ Form::label($field['key'], trans('app.' . $field['key'])) }} <br/>

        @if($field['type'] == 'single_line')

            {{ Form::text($field['key']) }}
            <br/>


        @elseif ($field['type'] == 'drop_down')

            {!! Form::select($field['key'], $field['options'] ) !!}
            <br/>

        @elseif( ($field['type'] == 'check_box') )

            @foreach($field['options'] as $option)
                {{ Form::checkbox($option['name'], $option['value'])  }}
                {{ Form::label($option['label'] ) }} <br/>
            @endforeach
            <br/>
        @endif
    @endforeach
    <br/>
    {{ Form::submit('Patvirtinti'), array('class'=>'btn btn-success') }}
    {!! Form::close() !!}
@endsection