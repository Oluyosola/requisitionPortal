@extends('layouts.new_app')
@section('content')
<div class="nav-left-sidebar">
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
                    <li class="nav-item nav-link">
                        <a class="" href="{{url('/store')}}" >Dashboard</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="" href="{{route('home')}}" >General Dashboard</a>
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
                   </ul>
            </div>
        </nav>
    </div>
</div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Requisition Dashboard </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                @include('inc.message')
                {{-- <div class="container"> --}}
                    
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body" style="background-color:#0077ad">
                                <h5 class="" style="color:#003765">Total Number of Items</h5>
                                <div class="metric-value d-inline-block">
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body" >
                                <h5 class="text-muted">Items at Reorder Level</h5>
                                <div class="metric-value d-inline-block">
                                    {{-- <h1 class="mb-1">{{$results->total()}}</h1> --}}
                                </div>
                            </div>
                            <div id="sparkline-revenue2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body" style= "background-color:#08457e; color:white">
                                <h5 class=>Stockout Items</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">0</h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue3"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted"> </h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"></h1>
                                </div>
                            </div>
                            <div id="sparkline-revenue4"></div>
                        </div>
                    </div>
                </div>
                    
                {{-- <div class="col-xl-12 col-12 col-md-12 col-sm-12 col-12"> --}}
                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-primary" style="background-color: #003765" href="{{ URL::to('/req/pdf') }}">Export to PDF</a>
                    </div> 


       
    </div>
</div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
                       <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header text-center">Requisition Approval Board</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                                <tr class="border-0">
                                                    {{-- <th class="border-0">#</th> --}}
                                                    <th class="border-0">#</th>
                                                    <th class = "border-0">Requisition ID</th>
                                                    <th class="border-0">Requestor Name</th>
                                                    <th class="border-0">Item</th>
                                                    <th class="border-0" colspan="">Process</th>
                                                    {{-- <th class="border-0">Delete</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @if (count($results)>0)
                                                    @foreach ($results as $result)
                                                   
                                            
                                                                                                  
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td><a data-toggle="modal" href='#modal-view{{$result->id}}'>{{$result->req_id}}</a></td>
                                                        <td>{{$result->user_name}}</td>
                                                        <td>{{$result->quantity.$result->item_name}}</td>
                                                           <td>
 
                                                                
                                                                <a data-toggle="modal" href='#modal-approval{{$result->id}}' class="btn btn-primary" style="background-color: #0077ad">Process</a>
                                                               
                                                             
                                                         </td>
                                                     </tr>
                                                      
                                                     <div class="modal fade" id="modal-view{{$result->id}}">
                                                        <div class="modal-dialog">
                                                           <div class="modal-content">
                                                              {{-- <div class="row"> --}}
                                                                  <div class="modal-header">
                                                                 <h4 class="text-center">Requisition Details</h4>
                                                                </div>
                                                                 <div class="modal-body">
                                                                     <h5>REQ Number: {{$result->req_id}}</h5>
                                                                     <h5>REQ category: {{$result->category_name}}</h5>
                                                                     <h5>REQ Item: {{$result->item_name}}</h5>
                                                                     <h5>REQ Quantity: {{$result->item_quantity.$result->quantity_unit}}</h5>
                                                                     <h5>REQ Description: {{$result->description}}</h5>
                                                                     {{-- <h5>REQ Status: {{$result->status_name}}</h5> --}}
                                                                 </div>
                                                              {{-- </div> --}}
                                                              <div class="modal-footer">
                                                                
                                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              </div>
                                                           </div>
                                                        </div>
                                                  </div>

                                                   
                                                   <div class="modal fade" id="modal-approval{{$result->id}}">
                                                     <form action="{{route('store_action', $result->id)}}" method="GET">
                                                        <div class="modal-dialog">
                                                           <div class="modal-content">
                                                              <input type="hidden" name="approve" value="{{$result->id}}">
                                                              <div class="modal-header">
                                                                 <h4 class="modal-title">Process Requistion</h4>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                 
                                                              </div>
                                                              <div class="modal-body">
                                                                 <div class="form-group row" style="padding-top: 20px">
                                                                     <label for="store_processing_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                     <div class="col-md-6">
                                                                         <textarea name="store_processing_comment" rows="4" cols="50" maxlength="50" placeholder = "Justification"id="name" class="form-control" required="required"></textarea><br>
                                                                     </div>
                                                                 </div>
                                                                 <div class="form-group row" style="padding-top: 20px">
                                                                    <label for="quantity_given" class="col-md-4 col-form-label text-md-right">{{ __('Quantity Given') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input type="number" name="quantity_given" id="quantity_given" class="form-control" required="required"><br>
                                                                    </div>
                                                                </div>
                                                                 <div>
                                                                    <input type="hidden" value="{{$result->id}}" name="req_id">
                                                                </div>
                                                             </div>
                                                              <div class="modal-footer">
                                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                 <input type="submit" name="submit" value="Process" class="btn btn-success">
                                                                
                                                              </div>
                                                           </div>
                                                        </div>
                                                     </form>
                                                  </div>
                                                  
                                                    @endforeach
                                                    
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->



        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
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