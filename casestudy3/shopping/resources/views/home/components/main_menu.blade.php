<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
@foreach($categorysLimit as $categorysParent )


        <li class="dropdown">
            <a href="#">
                {{ $categorysParent->name }}
                <i class="fa fa-angle-down"></i>
            </a>

            @include('home.components.child_menu',['categorysParent'=>$categorysParent])

        </li>
        @endforeach
        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>
