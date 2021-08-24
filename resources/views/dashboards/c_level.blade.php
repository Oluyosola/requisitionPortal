@extends('layouts.new_app')
@section('content')
@include('sidebar')
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header text-center">Requisition Approval Board</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    {{-- <th class="border-0">#</th> --}}
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Requestor Name</th>
                                                    <th class="border-0">Category</th>
                                                    <th class="border-0">Item</th>
                                                    <th class="border-0">Quantity</th>
                                                    <th class="border-0">Description</th>
                                                    {{-- <th class="border-0">Status</th> --}}
                                                    <th class="border-0" colspan="2">Approval/Rejection</th>
                                                    {{-- <th class="border-0">Delete</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- {{dd($results->user->email)}} --}}
                                                @if (count($results)>0)
                                                    @foreach ($results as $result)
                                                    {{-- @if((Auth::user()->designation_id == 4) && ($result->is_manager_approved == 1)) --}}
                                                       {{-- @if(($result->user->reporting_line1_id == Auth::user()->designation_type_id) ||
                                                        (Auth::user()->designation_id == 3 && $result->is_shth_approved == 1) || --}}
                                                         
                                                         {{-- $result->user->reporting_line1_id == Auth::user()->designation_type_i --}}
                                                         {{-- && $result->user->reporting_line1_id == Auth::user()->designation_type_id --}}
                                                                                                    
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$result->user_name}}</td>
                                                        <td>{{$result->category_name }}</td>
                                                        <td>{{$result->item_name}}</td>
                                                        <td>{{$result->quantity}}</td>
                                                        <td>{{$result->description}}</td>
                                                       
                                                        {{-- <td>{{$result->created_at}}</td> --}}
                                                        {{-- <td>{{ $result->status->name }}</td> --}}
                                                        {{-- <td><button style="background-color: #0077ad"> <a href="{{route('approve_requisition', $result->id)}}">Accept</a></button></td>
                                                        <td><button style="background-color: red"> <a href="{{route('reject_requisition', $result->id)}}">Reject</button></td> --}}
                                                        {{-- {{$result->}} --}}
                                                        {{-- {{$result->user_id}} --}}
                                                        {{-- {{Auth::user()->id}} --}}
                      
                                                        <td>
 
                                                            {{-- <button class="btn btn-success"><a data-toggle="modal" href='#modal-approve{{$result->id}}'>Approval </a></button>  --}}
                                                            <a data-toggle="modal" href='#modal-approval{{$result->id}}' class="btn btn-primary">Approve</a>
                                                           <a data-toggle="modal" href='#modal-reject{{$result->id}}' class="btn btn-danger">Reject</a>

                                                         
                                                     </td>
                                                 </tr>
                                                  

                                               
                                               <div class="modal fade" id="modal-approval{{$result->id}}">
                                                 <form action="{{route('clevel_approve_requisition', $result->id)}}" method="GET">
                                                    <div class="modal-dialog">
                                                       <div class="modal-content">
                                                          <input type="hidden" name="approve" value="{{$result->id}}">
                                                          <div class="modal-header">
                                                             <h4 class="modal-title">Approve Requistion</h4>
                                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                             
                                                          </div>
                                                          <div class="modal-body">
                                                             <div class="form-group row" style="padding-top: 20px">
                                                                 <label for="clevel_approval_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                 <div class="col-md-6">
                                                                     <textarea name="clevel_approval_comment" rows="4" cols="50" maxlength="50" placeholder = "e.g Give Justification for the approval"id="name" class="form-control" required="required"></textarea><br>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                          <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                             <input type="submit" name="submit" value="Approve" class="btn btn-success">
                                                            
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </form>
                                              </div>
                                              <div class="modal fade" id="modal-reject{{$result->id}}">
                                                <form action="{{route('clevel_reject_requisition', $result->id)}}" method="GET">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <input type="hidden" name="reject" value="{{$result->id}}">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Reject Requistion</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                       
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row" style="padding-top: 20px">
                                                                    <label for="clevel_reject_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                    <div class="col-md-6">
                                                                        <textarea name="clevel_rejection_comment" rows="4" cols="50" maxlength="50" placeholder = "e.g Give reasons for rejecting"id="reject" class="form-control" required="required"></textarea><br>
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