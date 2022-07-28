<div class="dashboard-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="assets/img/synlab.png"><img src="assets/img/synlab.png" height="50px" alt="" style="margin-left: 20px"></a>   
        <ul class="navbar-nav ml-auto">
            @if(Auth::guard('web')->check())
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        @endif
    </nav>
</div>





