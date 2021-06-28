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
                        <h3 style="color: white">Menu</h3>
                    </li>
                    <li class="nav-item nav-link" style="color: white">
                        <a class="" href="{{url('/sh')}}" style="color: white">Dashboard</a>
                    </li>
                    <li class="nav-item nav-link" style="color: white">
                        <a href="{{route('home')}}" style="color: white">General Dashboard</a>
                    </li>
                    <li class="nav-item nav-link">
                        
                        <a class="" href="{{route('sh_tl_approved')}}" >Approved</a>
                    </li>
                    <li class="nav-item nav-link">
                        
                        <a class="" href="{{route('sh_tl_rejected')}}" >Rejected</a>
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
                                        <li class="breadcrumb-item active" aria-current="page">Approval Dashboard </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                       <!-- ============================================================== -->

                        <!-- ============================================================== -->

                                      <!-- recent orders  -->
                        <!-- ============================================================== -->
                        @include('inc.message')
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header text-center" style="background-color: #0077ad">Requisition Approval Board</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover" >
                                            <thead class="">
                                                <tr class="border-0">
                                                    {{-- <th class="border-0">#</th> --}}
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Requisistion ID</th>
                                                    <th class="border-0">Requestor Name</th>
                                                    <th class="border-0">Category</th>
                                                    <th class="border-0">Item</th>
                                                    <th class="border-0">Quantity</th>
                                                    {{-- <th class="border-0">Description</th> --}}
                                                    {{-- <th class="border-0">Status</th> --}}
                                                    <th class="border-0" colspan="2">Approval/Rejection</th>
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @if (count($results)>0)
                                                    @foreach ($results as $result)
                                                   
                                            
                                                                                                  
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td><a data-toggle="modal" href='#modal-view{{$result->id}}'>{{$result->req_id}}</a></td>
                                                        <td>{{$result->user_name}}</td>
                                                        <td>{{$result->category_name }}</td>
                                                        <td>{{$result->item_name}}</td>
                                                        <td>{{$result->quantity.$result->quantityUnit}}</td>

                                                        
                                                        {{-- <td>{{$result->quantity}}</td>
                                                        <td>{{$result->description}}</td>
                                                         --}}
                                                       
  
                                                        <td>
                                                               <a data-toggle="modal" href='#modal-approval{{$result->id}}' class="btn btn-primary" style="background-color: #0077ad">Approve</a>
                                                               
                                                              <a data-toggle="modal" href='#modal-reject{{$result->id}}' class="btn btn-danger">Reject</a>

                                                            
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

                                                    <div class="modal fade" id="modal-reject{{$result->id}}">
                                                        <form action="{{route('sh_tl_reject_requisition', $result->id)}}" method="GET">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Reject Requistion</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                               
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group row" style="padding-top: 20px">
                                                                            <label for="sh_tl_reject_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                            <div class="col-md-6">
                                                                                <textarea name="sh_tl_rejection_comment" rows="4" cols="50" maxlength="50" placeholder = "e.g Give reasons for rejecting"id="reject" class="form-control" required="required"></textarea><br>
                                                                            </div>
                                                                            <div>
                                                                                <input type="hidden" name="requisition" value="{{$result->id}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <input type="submit" name="submit" value="reject" class="btn btn-danger">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
    
                                                      

                                                  
                                                  <div class="modal fade" id="modal-approval{{$result->id}}">
                                                    <form action="{{route('sh_tl_approve_requisition', $result->id)}}" method="GET">
                                                       <div class="modal-dialog">
                                                          <div class="modal-content">
                                                             {{-- <input type="hidden" name="requisition" value="{{$result->id}}"> --}}
                                                             <div class="modal-header">
                                                                <h4 class="modal-title">Approve Requistion</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                
                                                             </div>
                                                             <div class="modal-body">
                                                                <div class="form-group row" style="padding-top: 20px">
                                                                    <label for="sh_tl_approval_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                    <div class="col-md-6">
                                                                        <textarea name="sh_tl_approval_comment" rows="4" cols="50" maxlength="50" placeholder = "e.g Give Justification for the approval"id="name" class="form-control" required="required"></textarea><br>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <input type="hidden" name="requisition" value="{{$result->id}}">
                                                                </div>
                                                                <div>
                                                                    <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                                                    {{-- <input type="quantity" name="" id=""> --}}
                                                                    <div class="col-md-6">

                                                                    <input type="number" value="{{$result->quantity}}" step="0.01" name="quantity" style="width: 150px" placeholder = "" id="input" class="form-control" required="required" title=""><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <input type="submit" name="submit" value="Approve" class="btn btn-success" style="background-color: #0077ad">
                                                               
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </form>
                                                 </div>
                                                 
                                                </tr>
                                                
                                                {{-- @endif --}}
                                                 @endforeach
                                               @else
                                                   <h3 style="text-align: center">No Requistion found for Approval</h3> 
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