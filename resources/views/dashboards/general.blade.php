@extends('layouts.new_app')
@section('content')
@section('style')
      @include('layouts.datatables')
    @endsection

    <div class="nav-left-sidebar sidebar-light" style="background-color: #08457e">
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
                <div class="ecommerce-widget">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body" style="background-color:powderblue">
                                    <h5 class="" style="color: blue">Create New Requisition</h5>
                                    <div class="metric-value d-inline-block">
                                        <a class="mb-1" href="{{route('new_requisition')}}"><img src="assets/img/addition.png" alt="" width="50px" height="40px"></a>
                                    </div>
                                </div>
                                <div id="sparkline-revenue"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body" >
                                    <h5 class="text-muted">Total Number of Requisitions Made</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{$results->total()}}</h1>
                                                {{-- @foreach ($results as $r) --}}
                                                
                                                {{-- @endforeach --}}
                                    </div>
                                    {{-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            {{-- <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span> --}}
                                        {{-- </div> --}} 
                                </div>
                                <div id="sparkline-revenue2"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body" style= "background-color:#08457e; color:white">
                                    <h5 class=>Total Number of Requisitions approved</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">0</h1>
                                    </div>
                                    {{-- <div class="metric-label d-inline-block float-right text-primary font-weight-bold"> --}}
                                            {{-- <span>N/A</span> --}}
                                        {{-- </div> --}}
                                </div>
                                <div id="sparkline-revenue3"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Favourite category</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">Asset</h1>
                                    </div>
                                    {{-- <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            {{-- <span>-2.00%</span> --}}
                                        {{-- </div> --}} 
                                </div>
                                <div id="sparkline-revenue4"></div>
                            </div>
                        </div>
                    </div>
                        {{-- <div class="row"> --}}
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-primary" href="{{ URL::to('/op') }}">Export to PDF</a>
                            </div>
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header text-center">Requisition Board</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                {{-- <th class="border-0">Id</th> --}}
                                                <th class="border-0">Category</th>
                                                <th class="border-0">Item</th>
                                                <th class="border-0">Quantity</th>
                                                <th class="border-0">Description</th>
                                                <th class="border-o">Created On</th>
                                                <th class="border-0">Approval Status</th>
                                                <th class="border-0">Edit</th>
                                                <th class="border-0">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($results) >0)
                                                @foreach($results as $result)
                                                    <tr>
                                                        {{-- <td>{{$result->id }}</td>                                                        --}}
                                                        <td>{{$result->category->name }}</td>
                                                        <td>{{$result->item->name}}</td>
                                                        <td>{{$result->quantity}}</td>
                                                        <td>{{$result->description}}</td>
                                                        <td>{{$result->created_at}}</td>
                                                        <td>{{$result->status->name}}</td>
                                                        <td>
                                                            <center>
                                                                <a data-toggle="modal" href='#modal-edit{{$result->id}}'><img src="{{ asset('/assets/img/edit.svg') }}" width="15px" > </a>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <a data-toggle="modal" href='#modal-delete{{$result->id}}'><img src="{{ asset('/assets/img/delete.svg') }}" width="15px" > </a>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modal-delete{{$result->id}}">
                                                        <div class="modal-dialog">
                                                           <div class="modal-content">
                                                              {{-- <div class="row"> --}}
                                                                 <h4 class="text-center">Are you sure you want to delete this Requisition ?</h4>
                                                              {{-- </div> --}}
                                                              <div class="modal-footer">
                                                                 <a href="{{route('delete_requisition', $result->id)}}" class="btn btn-danger">Yes</a>
                                                                 <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                              </div>
                                                           </div>
                                                        </div>
                                                  </div>
                                                  <div class="modal fade" id="modal-edit{{$result->id}}">
                                                    <form action="" method="POST">
                                                       <div class="modal-dialog">
                                                          <div class="modal-content">
                                                             <input type="hidden" name="company" value="{{$result->id}}">
                                                             <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Edit Requiistion</h4>
                                                             </div>
                                                             <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                                                    <div class="col-md-6">        
                                                                        <select name="category" class="form-control" id="input">
                                                                            <option value="">--- Select category ---</option>
                                                                            @foreach ($result->category as $key => $value)
                                                                                <option value="{{ $key }}">{{ $value }}</option>
                                                                             @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="item" class="col-md-4 col-form-label text-md-right">{{ __('Select Item') }}</label>
                                                                    <div class="col-md-6">
                                                                        <select name="item" class="form-control" id="input">
                                                                            <option>--item--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                                                    <div class="col-md-6">
                                                                        <textarea name="description" rows="4" cols="50" maxlength="50" id="input" cols="30" rows="10" class="form-control" value="{{$result->description}}" required="required" title=""></textarea><br>
                                                                    </div>
                                                                </div>
                                                                
                                                                    <div class="form-group row">
                                                                        {{-- <div class="control form-inline"> --}}
                                                                        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                                                                        <div class="col-md-6">
                                                                            <input type="number" value="{{$result->quantity}}" name="quantity" style="width: 150px" placeholder = "" id="input" class="form-control" required="required" title=""><br>
                                        
                                                                        {{-- </div> --}}
                                                                    </div>
                                                                  
                                                             </div>
                                                             <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <input type="submit" name="" value="Save changes" class="btn btn-primary">
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
                            <div class="center">
                            {{ $results->links() }}
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ url('/home') }}" target="_blank" class= "btn btn-default"><i class="fa fa-print" aria-hidden = "true"></i>Print</a>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                            <!-- end recent orders  -->


                            <script type="text/javascript">
                                $(document).ready(function(){
                                $('.btnprn').printPage();
                                });
                                </script>

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
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
@endsection
  @section('datatable_scripts')
    <script type="text/javascript">
      // $(document).ready(function() {
          $('#example').DataTable({
              dom: 'Bfrtip',
              buttons: [
                  {
                       extend: 'pdf',
                       footer: true,
                       exportOptions: {
                            columns: [0,1,2,3,4]
                        }
                   },
                   {
                       extend: 'csv',
                       footer: false,
                    
                   },
                   {
                       extend: 'excel',
                       footer: false
                   }
              ],
          });
      // } );
    </script>
  @endsection
