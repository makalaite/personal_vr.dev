@extends('user.frontend')
{{--{{dd($page)}}--}}
@section('title', $title )

@section('content')

    <div id="pages_title">
        {{$title}}
    </div>
    <div>
        <img src="{{$page['image']['path']}}">
    </div>
    <h4>{{$description_long}}</h4>


    {{--{{$page['translation']['description_short']}}--}}
    {{--{{$page['translation']['description_long']}}--}}




@endsection