@extends('admin.core')

@section('content')
    <div id="list">
        @if(sizeof($list) > 0)
            <table class="table table-hover">
                <tr>
                    @foreach($list[0] as $key => $value)
                        <th>{{$key}}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($list as $record)
                        @foreach($record as $key => $one)
                        @if($key == 'is_active')
                                <td>@if($one == 1)
                                        <button onclick="enableDisableLanguage( {{ route($callAction, $record['id'] ),0 }} )" type="button"  class="btn btn-danger">Disable</button>
                                        <button onclick="enableDisableLanguage({{ route($callAction, $record['id'] ),1 }})" type="button" style="display:none" class="btn btn-success">{{ trans('app.activation') }}</button>
                                    @else
                                        <button onclick="enableDisableLanguage({{ route($callAction, $record['id'] ),1 }})" type="button" style="display:none" class="btn btn-danger">{{ trans('app.disable') }}</button>
                                        <button onclick="enableDisableLanguage({{ route($callAction, $record['id'] ),0 }})" type="button" class="btn btn-success">Activation</button>
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
        function enableDisableLanguage(URL, value) {

        }
    </script>
    @endsection