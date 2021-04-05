@extends('layouts.new_app')
@section('content')
<div class="nav-left-sidebar sidebar-light" style="background-color: #003765">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
            {{-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        <h3 style="color: wheat">Menu</h3>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Approval Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        {{-- <a href="{{route('home')}}" ><i class="fa fa-fw fa-user-circle"></i>General Dashboard</a> --}}
                        {{-- <a class="" href="{{route('home')}}" >General Dashboard</a>
                    </li>
                    <li class="nav-item "> --}}
                        {{-- <a href="{{route('home')}}" ><i class="fa fa-fw fa-user-circle"></i>General Dashboard</a> 
                        <a class="" href="{{route('manager_actions')}}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">Approved/Rejected Requisition</a>
                    </li>                    
                </ul>
            </div> --}}
        </nav>
    </div>
</div>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Synlab Requisition Portal </h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Approval Dashboard </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-center" style="background-color: #0077ad"><h4>{{ __('Create Item') }}</h4></div>
                            <div class="card-body">
                                <form method="POST" action="{{route('store_new_requisition') }} ">
                                    <div class="form-group">

                                    <label for="category">Item category</label>
                                    <select name="moreFields[0][category_id]" class="form-control category-select" id="category-select0" onchange="onCategorySelectChange(0)">
                                        <option value="">--- Select Item Category ---</option>
                                         @foreach ($categories as $category)
                                        <option value="">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="item">Item</label>
                                    <input type="text" name="item" class="form Control">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" class="form Control">
                                    </div>
                                    <div class="form-group">
                                        <div class="clear" style="clear: both"></div>
                                        <div class="col-md-12">
                                            <p align="center" style="margin-top: 10px;">
                                                <button type="submit" class="btn btn-primary" style="background-color: #0077ad">
                                                    {{ __('Create') }}
                                                </button>
                                            </p>
                                    </div>

                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

               <div class="center">
                {{-- {{ $results->links() }} --}}
                <button class="btn btn-primanry" style="background-color: #003765; color:white"> <a href="{{url('/store')}}">Go Back</a> </button>
            </div>
            
                   <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                         Copyright © Synlab. All rights reserved.
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>   
@endsection