<nav class="col-2  bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @if(!empty($sites))
                @foreach($sites as $obj)
                    <li class="nav-item">
                        <a class="nav-link site-links" href="{{url('dashboard/'.encrypt($obj->id))}}">
                            <span data-feather="home"></span>
                            {{$obj->url}}</span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</nav>