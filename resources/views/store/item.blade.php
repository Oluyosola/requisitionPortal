@extends('layouts.new_app')
@section('content')
<div class="nav-left-sidebar sidebar-light" style="background-color: #003765">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
        </nav>
    </div>
</div>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row" style="margin-top: 50px">
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
            @include('inc.message')
            {{-- <div class="container"> --}}
                {{-- <div class="row justify-content-center"> --}}
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
                        {{-- <div class="card">
                            <div class="card-header text-center" style="background-color: #0077ad"><h4>{{ __('Create Item') }}</h4></div>
                            <div class="card-body"> --}}
                                <form method="POST" action="{{route('store_new_item')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="item">Item</label>
                                            <input type="text" name="item" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="quantity">Quantity</label>
                                            <input type="number"step="0.01" name="quantity" class="form-control">
                                        </div>

                                        
                                        {{-- </div> --}}
                                        <div class="col">
                                            <label for="quantity_unit">Item category</label>
                                            <select name="quantity_unit" class="form-control " id="">
                                                <option value="">--- Select Item Unit ---</option>
                                                @foreach ($quantity_unit as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                        <div class="clear" style="clear: both"></div>
                                        <div class="col">
                                            <p align="center" style="margin-top: 10px;">
                                                <button type="submit" class="btn btn-primary" style="background-color: #0077ad">
                                                    {{ __('Create') }}
                                                </button>
                                            </p>
                                    </div>
                                        </div>
                                        
                                </form>
                        </div>
                        </div>
                        </div>

                        <div class="card">
                            <h5 class="card-header text-center"> Items List</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">Item ID</th>
                                                <th class="border-0">Item Name</th>
                                                <th class="border-0">Quantity</th>
                                                
                                                {{-- <th class="border-0">Created On</th> --}}
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($results) >0)
                                                @foreach($results as $result)
                                                    <tr>
                                                        {{-- <td>{{$result->id }}</td>  
                                                        td                                                      --}}
                                                        {{-- <td><a data-toggle="modal" href='#modal-view{{$result->id}}'>{{$result->req_id}}</td></a> --}}
                                                            
                                                        <td>{{$result->item_id}}</td>
                                                        <td>{{$result->name}}</td>

                                                        <td>{{$result->quantity.$result->quantityUnit->name}}</td>
                                                        {{-- <td>{{date_format($result->created_at, 'jS M Y')}}</td> --}}
                                                       
                                                        
                                                       
                                                    </tr>
                                                    
                                                    
                                                        @endforeach
                                                   @endif
            
            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="center">
                            {{-- {{ $results->links() }} --}}
                            <button class="btn btn-primanry" style="background-color: #003765; color:white"> <a href="{{url('/sh')}}">Go Back</a> </button>
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