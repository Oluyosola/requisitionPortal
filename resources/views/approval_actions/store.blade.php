@extends('layouts.new_app')
@section('content')
@include('dashboards.sidebar')
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
            <div class="card">
                <h5 class="card-header text-center">Requisition Board</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th>Requisition ID</th>
                                    <th>Requestor</th>
                                    <th class="border-0">Category</th>
                                    <th class="border-0">Item</th>
                                    <th class="border-o">Created On</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($results) >0)
                                    @foreach($results ?? '' as $result)
                                        <tr>
                                            {{-- <td>{{$result->id }}</td>  
                                            td                                                      --}}
                                            <td><a data-toggle="modal" href='#modal-view{{$result->id}}'>{{$result->req_id}}</td></a>
                                            <td>{{$result->user_name}}</td>
                                            <td>{{$result->category_name }}</td>
                                            <td>{{$result->item_name}}</td>
                                            {{-- <td>{{date_format($result->created_at, 'jS M Y')}}</td> --}}
                                           
                                            
                                           
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

                                        
                                            @endforeach
                                       @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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