@extends('admin.core')

@section('content')

    <div><h3> {{ $title }}</h3></div>
    <div> @if(isset($create))
            <a class="btn btn-success" href="{{route($create)}}"> New one </a>
        @endif
    </div>
    @if(sizeof($list) > 0)
        <table class="table table-hover">
            <h3>{{ $tableName }}</h3>
            <tr>
                @foreach($list[0] as $key => $value)
                    <th>{{$key}}</th>
                @endforeach

                @if(isset($edit))
                    <th> Redaguoti</th>
                @endif
                @if(isset($delete))
                    <th> Ištrinti</th>
                @endif
            </tr>


            @foreach($list as $record)
                <tr id="{{ $record['id'] }}">
                    @foreach($record as $key => $one)
                        @if($key == 'is_active')
                            <td>@if($one == 1)
                                    <button onclick="toggleActive( '{{ route($callAction, $record['id']) }}',0 )"
                                            type="button" class="btn btn-danger">{{ trans('app.disable') }}</button>
                                    <button onclick="toggleActive( '{{ route($callAction, $record['id']) }}',1 )"
                                            type="button" style="display:none"
                                            class="btn btn-success">{{ trans('app.activation') }}</button>
                                @else
                                    <button onclick="toggleActive( '{{ route($callAction, $record['id']) }}',0 )"
                                            type="button" style="display:none"
                                            class="btn btn-danger">{{ trans('app.disable') }}</button>
                                    <button onclick="toggleActive( '{{ route($callAction, $record['id']) }}',1 )"
                                            type="button"
                                            class="btn btn-success">{{ trans('app.activation') }}</button>
                                @endif
                            </td>


                        @elseif($key == 'translation')
                            <td>{{$one['name'] . ' ' . $one['language_code']}}</td>

                        @else
                            <td>{{$one}}</td>

                        @endif
                    @endforeach

                    @if(isset($edit))

                        <td><a href="{{ route($edit, $record['id']) }}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                    @endif

                    @if(isset($delete))
                        <td>
                            <button onclick="deleteItem( '{{ route($delete, $record['id']) }}' )"
                                    class="btn btn-danger">Delete
                            </button>
                        </td>
                    @endif
                </tr>

            @endforeach

        </table>

    @else <h1> {{ trans('app.no_data') }} </h1>
    @endif
@endsection


@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('ERROR')
                }
            });
        }

        function toggleActive(URL, value) {
            console.log(URL, value);
            $.ajax({
                url: URL,
                type: 'POST',
                data: {
                    is_active: value
                },
                success: function (response) {

//                  console.log($('#' + response.id))
//                    console.log($('#' + response.id).hide());
//                    $('#' + response.id).css({
//                        opacity:0.5,
//                        backgroundColor: 'grey'
//                    });
                    var $danger = ($('#' + response.id).find('.btn-danger'));
                    var $success = ($('#' + response.id).find('.btn-success'));

//                  console.log($danger, $success);

//                    if(response.is_active == 1)
//                    {
//                        alert('response is active ' + response.is_active)
//                    }

                    if (response.is_active === '1') {
                        $success.hide();
                        $danger.show()
                    } else {
                        $success.show();
                        $danger.hide()
                    }
                }
            });
        }
    </script>
@endsection
