@extends('layouts.new_app')
@section('content')
@include('inc.sidebar')
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
                                <h5 class="card-header text-center" style="background-color: #0077ad" >Requisition Approval Board</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    {{-- <th class="border-0">#</th> --}}
                                                    <th class="border-0">#</th>
                                                    <th class = "border-0">Requisition ID</th>
                                                    <th class="border-0">Requestor Name</th>
                                                    <th class="border-0">Category</th>
                                                    <th class="border-0">Description</th>
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
                                                        <td>{{$result->description}}</td>
                                                       
                                                            <td>

                                                                <a data-toggle="modal" href='#modal-approval{{$result->id}}' class="btn btn-primary" style="background-color: #0077ad">Approve</a>
                                                               <a data-toggle="modal" href='#modal-reject{{$result->id}}' class="btn btn-danger">Reject</a>


                                                         </td>
                                                     </tr>


                                                     <div class="modal fade" id="modal-view{{$result->id}}">
                                                        <div class="modal-dialog">
                                                           <div class="modal-content">
                                                                  <div class="modal-header">
                                                                 <h4 class="text-center">Requisition Details</h4>
                                                                </div>
                                                                 <div class="modal-body">
                                                                     <h5>REQ Number: {{$result->req_id}}</h5>
                                                                     <h5>REQ category: {{$result->category_name}}</h5>
                                                                     <h5>REQ Item: {{$result->item_name}}</h5>
                                                                     <h5>REQ Quantity: {{$result->item_quantity.$result->quantity_unit}}</h5>
                                                                     <h5>REQ Description: {{$result->description}}</h5>
                                                                 </div>
                                                              <div class="modal-footer">

                                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              </div>
                                                           </div>
                                                        </div>
                                                  </div>

                                                   <div class="modal fade" id="modal-approval{{$result->id}}">
                                                     <form action="{{route('manager_approve_requisition', $result->id)}}" method="GET">
                                                        @csrf
                                                        <div class="modal-dialog">
                                                           <div class="modal-content">
                                                              <input type="hidden" name="approve" value="{{$result->id}}">
                                                              <div class="modal-header">
                                                                 <h4 class="modal-title">Approve Requistion</h4>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                              </div>
                                                              <div class="modal-body">
                                                                 <div class="form-group row" style="padding-top: 20px">
                                                                     <label for="manager_approval_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                     <div class="col-md-6">
                                                                         <textarea name="manager_approval_comment" rows="4" cols="50" maxlength="50" placeholder = "e.g Give Justification for the approval"id="name" class="form-control" required="required"></textarea><br>
                                                                     </div>
                                                                     <div>
                                                                         <input type="hidden" value="{{$result->id}}" name="req_id">
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
                                                  <div class="modal fade" id="modal-reject{{$result->id}}">
                                                    <form action="{{route('manager_reject_requisition', $result->id)}}" method="GET">
                                                        @csrf
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <input type="hidden" name="reject" value="{{$result->id}}">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Reject Requistion</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row" style="padding-top: 20px">
                                                                        <label for="manager_reject_comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                                                                        <div class="col-md-6">
                                                                            <textarea name="manager_rejection_comment" rows="4" cols="50" maxlength="50" placeholder = "e.g Give reasons for rejecting"id="reject" class="form-control" required="required"></textarea><br>
                                                                        </div>
                                                                        <div>
                                                                            <input type="hidden" value="{{$result->id}}" name="req_id">
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
                                                    @else
                                                    <h3 style="text-align: center">No Requistion found for Approval</h3>
                                                 @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
@include('inc.footer')
                            </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>

@endsection
