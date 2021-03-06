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

            @if(in_array($field['key'], ['language_code', 'category_id', 'time', 'experience']) )

                {{Form::select($field['key'],$field['options'], $record[$field['key']])}}
            @else
                {{Form::select($field['key'],$field['options'], $record[$field['key']], ['placeholder' => '']) }}
            @endif


        @else
            @if(in_array($field['key'], ['language_code', 'category_id', 'time', 'experience']) )
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

        var $time = $('#time'); //apsirasai kintamuosius, kad galetum naudoti paprasciau
        var $experience = $('#experience');


        if ($time.length > 0 && $experience.length > 0) { //patikrini pagal ilgi ar isvis egzistuoja time ir experience nes su isset visada rodyu,kad yra

            $time.bind('change', getAvailableHours); //Attach a handler to an event for the elements
            $experience.bind('change', getAvailableHours);


            function getAvailableHours() {
                console.log($time.val(), $experience.val()) //paduotos abi reiksmes vienoje funk, kad galetum kartu naudoti

                $.ajax({
                    url: '{{ route('app.order.reservation') }}', //php funkc bet ajaxe, todel reikia stringo, kad suprastu
                    type: 'GET',
                    data: {
                        time: $time.val(), //sukurti pavadinimai prilyginami reiksmem
                        experience: $experience.val()
                    },
                    success: function (response) {

                        console.log(response) //grazina uzbookinta data su valandomis
                    }
                });
            }

            var list = prepareForCheckBox ('2017-06-27');
            console.log(list);

            function prepareForCheckBox(day)
            {
                // reserved days from server
                var reserved = [day + ' 17:00:00', day + ' 17:10:00'];

                // new date
                var date = new Date(day + ' 00:00:00');

                // checking if date is today
                if (date.toDateString() == new Date().toDateString())
                    date = new Date();

                // closing time property
                var closingTime = 22;

                // opening time property
                var openingTime = 10;

                // available times for this
                var availableTimes = [];

                // allow reservation 2 hours from now
                date.setHours(date.getHours() + 2);

                // moving minutes to dividable by 10
                date.setMinutes(Math.ceil(date.getMinutes() / 10) * 10);

                // while it is not closing time execute
                while (date.getHours() < closingTime)
                {
                    // checking if hours are more than opening time
                    if (date.getHours() >= openingTime)
                    {
                        // creating reservation time visible for users
                        var time = date.getHours() + ':' + pad(date.getMinutes(), 2);
                        // creating dateTime / id which will be recorded in the database
                        var dateTime = day + ' ' + time + ':00';

                        // adding data to array
                        availableTimes.push(
                            {
                                title: time,
                                id: dateTime,
                                // checking if time is reserved
                                reserved: reserved.indexOf(dateTime) >= 0 ? 1 : 0
                            });
                    }

                    // interval each 10 minutes
                    // increasing time by 10 minutes
                    date.setMinutes(date.getMinutes() + 10);
                }

                // function which adds zeros from left size of the number 1 -> 001
                function pad(num, size) {
                    var s = num + "";
                    while (s.length < size) s = "0" + s;
                    return s;
                }

                return availableTimes;
            }
        }



    </script>
@endsection