@extends('admin.core')

@section('content')
    <div id="list">
        @if(sizeof($list) > 0)
            <table class="table table-hover">
                <h3>{{ trans('app.language_codes_list') }}</h3>
                <tr>
                    @foreach($list[0] as $key => $value)
                        <th>{{$key}}</th>
                    @endforeach
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

                            @else
                                <td>{{$one}}</td>

                            @endif
                        @endforeach
                </tr>
                @endforeach


            </table>

        @else <h1> {{ trans('app.no_data') }} </h1>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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

                    if (response.is_active) {
                        
                    }
                }
            })
        }
    </script>
@endsection