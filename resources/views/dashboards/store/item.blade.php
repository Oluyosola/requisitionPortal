@extends('layouts.new_app')
@section('content')
@include('inc.sidebar')
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
            
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
                        
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
                                        <div class="col">
                                            <label for="quantity">Reorder Quantity</label>
                                            <input type="number"step="0.01" name="reorder_quantity" class="form-control">
                                        </div>

                                        
                                        <div class="col">
                                            <label for="quantity_unit">Item Unit</label>
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
                                                <th class="border-0">Reorder Quantity</th>
                                                <th class="border-0" colspan="">Update Item</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($results) >0)
                                                @foreach($results as $result)
                                                    <tr>
                                                            
                                                        <td>{{$result->item_id}}</td>
                                                        <td>{{$result->name}}</td>

                                                        <td>{{$result->quantity.$result->quantityUnit->name}}</td>
                                                        <td>{{$result->reorder_quantity.$result->quantityUnit->name}}</td>
                                                       
                                                        <td>
 
                                                                
                                                            <a data-toggle="modal" href='#modal-update{{$result->id}}' class="btn btn-primary" style="background-color: #0077ad">Update</a>
                                                           
                                                         
                                                     </td>
                                                 </tr>
                                                  

                                               
                                               <div class="modal fade" id="modal-update{{$result->id}}">
                                                 <form action="{{route('update_item', $result->id)}}" method="GET">
                                                    @csrf

                                                    <div class="modal-dialog">
                                                       <div class="modal-content">
                                                          <div class="modal-header">
                                                             <h4 class="modal-title">Update Item</h4>
                                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                             
                                                          </div>
                                                          <div class="modal-body">
                                                            
                                                             <div class="form-group row" style="padding-top: 20px">
                                                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                                                                <div class="col-md-6">
                                                                    <input type="number" value="{{$result->quantity}}" step="0.01" name="quantity" class="form-control" required="required"><br>
                                                                </div>
                                                                <div class="form-group row" style="padding-top: 20px">
                                                                    <label for="reorder_quantity" class="col-md-4 col-form-label text-md-right">{{ __('Reorder Quantity') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input type="number" step="0.01" value="{{$result->reorder_quantity}}" name="reorder_quantity" class="form-control" required="required"><br>
                                                                    </div>
                                                            </div>
                                                            
                                                         </div>
                                                          <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                             <input type="submit" name="submit" value="Save" class="btn btn-success">
                                                            
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