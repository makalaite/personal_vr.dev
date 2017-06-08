<div id="menu">
    <h2><a href="{{ route('app.menu.index')  }}"> {{ trans('app.admin_menu') }} </a></h2>
    <ul>
        <li> <a href="{{ route('app.language.index')  }}"> {{ trans('app.languages') }} </a></li>
        <li> <a href="{{ route('app.orders.index')  }}"> {{ trans('app.orders') }} </a></li></li>
        <li> <a href="{{ route('app.pages.index')  }}"> {{ trans('app.pages') }} </a></li></li>
        <li> <a href="{{ route('app.categories.index')  }}"> {{ trans('app.categories') }} </a></li></li>
        <li> <a href="{{ route('app.users.index')  }}"> {{ trans('app.users') }} </a></li></li>
    </ul>
</div>
