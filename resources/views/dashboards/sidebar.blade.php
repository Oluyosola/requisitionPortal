<div class="nav-left-sidebar sidebar-light" style="background-color: #003765">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        <h3 style="color: wheat">Menu</h3>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="{{route('home')}}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    @if(Auth::user()->designation_id == 2 || Auth::user()->designation_id == 3)
                        <li class="nav-item nav-link" style="color: white">
                            <a class="" href="{{url('/sh')}}" style="color: white">Approval Dashboard</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('sh_tl_approved')}}" >Approved</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('sh_tl_rejected')}}" >Rejected</a>
                        </li>
                    @elseif(Auth::user()->designation_id == 4)
                        <li class="nav-item nav-link">
                            <a class="" href="{{url('/manager')}}">Manager's Dashboard</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('manager_actions')}}" >Approved</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('manager_rejected')}}" >Rejected</a>
                        </li>
                    @elseif(Auth::user()->designation_id == 6)
                        <li class="nav-item nav-link">
                            <a class="" href="{{url('/ic')}}">IC Dashboard</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('ic_actions')}}" >Approved</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('ic_rejected')}}" >Rejected</a>
                        </li>
                    @elseif(Auth::user()->designation_id == 7)
                        <li class="nav-item nav-link">
                            <a class="" href="{{url('/store')}}" >Store's Dashboard</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('store_processed')}}" >Processed</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('create_item')}}">Items</a>
                        </li>  
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('reorder')}}"> Reorder</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="" href="{{route('stock_out')}}">Stock Out</a>
                        </li>  
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
 