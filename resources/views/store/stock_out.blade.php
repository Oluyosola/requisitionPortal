@extends('layouts.new_app')
@section('content')
@include('inc.sidebar')
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
                                    <th class="border-0">Item ID</th>
                                    <th class="border-0">Item Name</th>
                                   
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Reorder Quantity</th>
                                   
                                    
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
                                           
                                            
                                           
                                        </tr>
                                            
                                           
                                        </tr>
                                        
                                        
                                            @endforeach
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