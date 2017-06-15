@extends('admin.core')

@section('content')
    <h3>{{  $title  }} </h3>
    {!! Form::open(['url' => $route]) !!}

    @foreach($fields as $field) <br/>

    {{ Form::label($field['key'], trans('app.' . $field['key'])) }} <br/>

    @if($field['type'] == 'single_line')

        @if(isset($record[$field['key']] ) )
            {{ Form::text($field['key'], $record[$field['key']] ) }}

            <br/>
        @else
            {{ Form::text($field['key']) }}
        @endif


    @elseif ($field['type'] == 'drop_down')

        @if($field['key'] == 'language_code')

            {!! Form::select($field['key'], $field['options'] ) !!}
            <br/>
        @else
            {!! Form::select($field['key'], $field['options'], null, array('placeholder'=> '') ) !!}
        @endif
        <br/>
    @elseif( ($field['type'] == 'check_box') )


        @foreach($field['options'] as $option)
            @if(isset($record[$field['name']] ) )
                {{ Form::checkbox($option['name'], $option['value'], $record['name'], $record['value'] ) }}
                {{ Form::label($option['label'] ) }} <br/>

            @else
                {{ Form::checkbox($option['name'], $option['value'] ) }}
                {{ Form::label($option['label'] ) }} <br/>
            @endif
            <br/>
        @endforeach
    @endif
    @endforeach
    <br/>
    {{ Form::submit('Patvirtinti'), array('class'=>'btn btn-success') }}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script>

        $('#language_code').bind('change', function () {

            //console.log( $('#language_code'). val())

            //console.log( window.location.href = 'http://www.codeacademy.lt'); //iskart nukreipia i puslapi

            // window.location.href = '/admin/menu' nukreips tiesiai i meniu lentele

            window.location.href = '?language_code=' + $('#language_code').val(); // nurodai vieta kur jau esi, pridedi nekintama nuoroda plius id su reiksme ant kurios atsistosi

        });
    </script>
@endsection