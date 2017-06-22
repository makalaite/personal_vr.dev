<div id="main-menu">

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @foreach($menu as $menuItem)
                        @if($menuItem['children'] == null)
                            <li><a href="#">{{$menuItem['translation']['name']}}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false"> {{$menuItem['translation']['name']}} <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    @foreach($menuItem['children'] as $child)
                                    <li><a href="#">{{$child['translation']['name']}}</a></li>
                                        @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"> {{trans('app.languages')}} <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                @foreach($languages as $key => $lang)
                                    <li><a href="{{$key}}">{{$lang}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"> Kambariai <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                @foreach($rooms as $room)
                                    <li><a href=" {{ app()->getLocale() . '/pages/' . $room['translation']['slug']}}">{{$room['translation']['title']}}</a></li>
                                @endforeach
                            </ul>
                        </li>




                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>