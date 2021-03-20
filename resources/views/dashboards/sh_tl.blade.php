@extends('layouts.new_app')
@section('content')
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
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('home')}}" ><i class="fa fa-fw fa-user-circle"></i>General Dashboard</a>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header text-center">Requisition Approval Board</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    {{-- <th class="border-0">#</th> --}}
                                                    <th class="border-0">Requestor Name</th>
                                                    <th class="border-0">Category</th>
                                                    <th class="border-0">Item</th>
                                                    <th class="border-0">Quantity</th>
                                                    <th class="border-0">Description</th>
                                                    <th class="border-0">Status</th>
                                                    <th class="border-0" colspan="2">Approval</th>
                                                    {{-- <th class="border-0">Delete</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- {{dd($results->user->email)}} --}}
                                                @if (count($results)>0)
                                                    @foreach ($results as $result)
                                                    {{-- @if((Auth::user()->designation_id == 1||2) && ($result->user->reporting_line1_id == Auth::user()->designation_type_id))
                                                        --}}
                                                    {{-- @if(($result->user->reporting_line1_id == Auth::user()->designation_type_id) ||
                                                        (Auth::user()->designation_id == 3 && $result->is_shth_approved == 1) || --}}
                                                         
                                                         {{-- $result->user->reporting_line1_id == Auth::user()->designation_type_i --}}
                                                         {{-- && $result->user->reporting_line1_id == Auth::user()->designation_type_id --}}
                                                                                                    
                                                    <tr>
                                                        <td>{{$result->user->name}}</td>
                                                        <td>{{$result->category->name }}</td>
                                                        <td>{{$result->item->name}}</td>
                                                        <td>{{$result->quantity}}</td>
                                                        <td>{{$result->description}}</td>
                                                        
                                                       
                                                        {{-- <td>{{$result->created_at}}</td> --}}
                                                        <td>{{ $result->status->name }}</td>
                                                        <td>
                                                            <td><button style="background-color: #0077ad"> <a href="{{route('approve_requisition', $result->id)}}">Accept</a></button></td>
                                                        <td><button style="background-color: red"> <a href="{{route('reject_requisition', $result->id)}}">Reject</button></td>
                                                        
 
                                                               {{-- <button style="background-color: #022e42;"><a data-toggle="modal" href='#modal-approve{{$result->id}}'>Approval </a></button>  --}}
                                                            
                                                        </td>
                                                    </tr>
                                                    {{-- <div class="modal fade" id="modal-approve{{$result->id}}">
                                                        <div class="modal-dialog">
                                                           <div class="modal-content">
                                                              <div class="row">
                                                                 <h4 class="text-center">Approval/Rejection</h4>
                                                                 
                                                              </div>
                                                              <div class="modal-footer">
                                                                 <a href="{{route('approve_requisition', $result->id)}}" class="btn btn-success">Approve</a>
                                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>
                                                              </div>
                                                           </div>
                                                        </div>
                                                  </div> --}}
                                                  {{-- <div class="modal fade" id="modal-approve{{$result->id}}">
                                                    <form action="{{route('approve_requisition')}}" method="POST">
                                                       <div class="modal-dialog">
                                                          <div class="modal-content">
                                                             <input type="hidden" name="company" value="{{$result->id}}">
                                                             <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Approval/ Requistion</h4>
                                                             </div>
                                                             <div class="modal-body">
                                                                <div class="form-group row" style="padding-top: 20px">
                                                                    <label for="comment_sh" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                    <div class="col-md-6">
                                                                        <textarea name="comment_sh" rows="4" cols="50" maxlength="50" placeholder = "e.g brief description of the requisition"id="name" class="form-control" required="required"></textarea><br>
                                                                    </div>
                                                                </div>
                                                             <div class="modal-footer">
                                                                <input type="submit" name="submit" value="Approve" class="btn btn-primary">
                                                                {{-- <a href="{{route('approve_requisition', $result->id)}}" class="btn btn-success">Approve</a> --}}
                                                                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button> --}}
                                                            
                                                                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                                                 
                                                             {{-- </div>
                                                          </div>
                                                       </div>
                                                    </form>
                                                 </div> --}}
                                      -

                                                  
                                                        {{-- <td><button style="background-color: #0077ad"> <a href="{{route('approve_requisition', $result->id)}}">Accept</a></button></td>
                                                        <td><button style="background-color: red"> <a href="{{route('reject_requisition', $result->id)}}">Reject</button></td> --}}
                                                        {{-- {{$result->}} --}}
                                                        {{-- {{$result->user_id}} --}}
                                                        {{-- {{Auth::user()->id}} --}}
                      
                                                </tr>
                                                {{-- {{Auth::user()->id}} --}}
                      
                                                @endif
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