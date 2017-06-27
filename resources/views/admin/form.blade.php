@extends('admin.core')

@section('content')
    <h3>{{ $serviceTitle }} </h3>
    {!! Form::open(['url' => $route, 'files' => true]) !!}

    @foreach($fields as $field) <br/>

    {{ Form::label($field['key'], trans('app.' . $field['key'])) }} <br/>


    @if($field['type'] == 'single_line')

        @if(isset($record[$field['key']] ) )
            {{ Form::text($field['key'], $record[$field['key']] ) }} <br/>
        @else
            {{ Form::text($field['key']) }}
        @endif


    @elseif($field['type'] == 'textarea')

        @if(isset ($record[$field['key']]))
            {{ Form::textarea($field['key'],$record[$field['key']],['rows' => $field['rows'], 'columns' => $field['columns'], ])}}
        @else
            {{ Form::textarea($field['key'],null,['rows' => $field['rows'], 'columns' => $field['columns'] , 'class' => 'form_textarea'])}}
        @endif


    @elseif ($field['type'] == 'drop_down')

        @if(isset($record[$field['key']]))

            @if($field['key'] == 'language_code' || $field['key'] == 'category_id' )
                {{Form::select($field['key'],$field['options'], $record[$field['key']])}}
            @else
                {{Form::select($field['key'],$field['options'], $record[$field['key']], ['placeholder' => '']) }}
            @endif


        @else
            @if($field['key'] == 'language_code' || $field['key'] == 'category_id')
                {{Form::select($field['key'],$field['options'])}}
            @else
                {{Form::select($field['key'],$field['options'], null, ['placeholder' => ''] ) }}

            @endif
        @endif <br/>


    @elseif( $field['type'] == 'check_box' )

        @if(isset($record[$field['key']]))
            @foreach($field['options'] as $option)

                {{Form::label($option['title'])}}
                {{Form::checkbox($option['name'],$option['value'], $record[$field['key']])}}

            @endforeach
        @else
            @foreach($field['options'] as $option)

                {{Form::label($option['title'])}}
                {{Form::checkbox($option['name'],$option['value'])}}

            @endforeach
        @endif

    @elseif($field['type'] == 'file')
        @if(isset($record[$field['key']]))

            {{Form::file('file'),$record[$field['key']]}}
        @else
            {{Form::file('file')}}
        @endif

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

        var $time = $('#time');
        var $experience = $('#experience');

        if ($time.length > 0 && $experience.length > 0) {

            $time.bind('change', function () {
                console.log($time.val())
            });

            $experience.bind('change', function () {
                console.log($experience.val())
            });

        }
    </script>
@endsection