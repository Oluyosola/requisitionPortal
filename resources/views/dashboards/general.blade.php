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
                <div class="row" style="margin-top: 50px">
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
                                    <h5 class="" style="color:#003765">Create New Requisition</h5>
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
                                    </div>
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
                                </div>
                                <div id="sparkline-revenue3"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Favourite category</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">Store</h1>
                                    </div>
                                </div>
                                <div id="sparkline-revenue4"></div>
                            </div>
                        </div>
                    </div>
                        
                       
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header text-center">Requisition Board</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th>Requisition ID</th>
                                            <th class="border-0">Category</th>
                                            <th class="border-0">Item</th>
                                            <th class="border-o">Created On</th>
                                            <th class="border-0">Approval Status</th>
                                            <th class="border-0">Edit</th>
                                            <th class="border-0">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($results) >0)
                                            @foreach($results as $result)
                                                <tr>
                                                    <td><a data-toggle="modal" href='#modal-view{{$result->id}}'>{{$result->req_id}}</a></td>
                                                    <td>{{$result->category->name }}</td>
                                                    <td>{{$result->item->name}}</td>
                                                    <td>{{date_format($result->created_at, 'jS M Y')}}</td>
                                                    <td>Pending</td>
                                                    <td>
                                                        <a data-toggle="modal" href='#modal-edit{{$result->id}}'><img src="{{ asset('/assets/img/edit.svg') }}" width="15px" > </a>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a data-toggle="modal" href='#modal-delete{{$result->id}}'><img src="{{ asset('/assets/img/delete.svg') }}" width="15px" > </a>
                                                        </center>
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
                                                                <h5>REQ category: {{$result->category->name}}</h5>
                                                                <h5>REQ Item: {{$result->item->name}}</h5>
                                                                <h5>REQ Quantity: {{$result->quantity.$result->quantityUnit->name}}</h5>
                                                                <h5>REQ Description: {{$result->description}}</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modal-delete{{$result->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <h4 class="text-center">Are you sure you want to delete this Requisition ?</h4>
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
                                                                            <select name="moreFields[0][category_id]" class="form-control category-select" id="category-select0" onchange="onCategorySelectChange(0)">
                                                                                <option value="">--- Select category ---</option>
                                                                                @foreach ($categories as $key => $value)
                                                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="item" class="col-md-4 col-form-label text-md-right">{{ __('Select Item') }}</label>
                                                                        <div class="col-md-6">
                                                                            <select name="moreFields[0][item_id]" class="form-control item-select" id="item-select0">
                                                                                <option>--item--</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                                                        <div class="col-md-6">
                                                                            <textarea name="description" rows="4" cols="50" maxlength="50" id= "input"class="form-control" value="{{$result->description}}" required="required" title=""></textarea><br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                                                                        <div class="col-md-6">
                                                                            <input type="number" value="{{$result->quantity}}" name="quantity" style="width: 150px" placeholder = "" id="input" class="form-control" required="required" title=""><br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <input type="submit" name="" value="Save changes" class="btn btn-primary">
                                                                    </div>
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
                    <div class="center">
                        {{ $results->links() }}
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
