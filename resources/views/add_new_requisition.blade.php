@extends('layouts.new_app')
@section('content')
{{-- <div class="dashboard-header"> --}}
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: rgb(147, 147, 252)"><h4>{{ __('Requisition Form') }}</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{route('store_new_requisition') }} ">
                        @csrf
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">        
                                <select name="category" class="form-control" id="input">
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
                                <select name="item" class="form-control" id="input">
                                    <option>--item--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea name="description" rows="4" cols="50" maxlength="50" placeholder = "e.g brief description of the requisition"id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>
                            </div>
                        </div>
                        
                            <div class="form-group row">
                                {{-- <div class="control form-inline"> --}}
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="quantity" style="width: 150px" placeholder = "" id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>

                                {{-- </div> --}}
                            </div>
                            {{-- <div class="form-group">
                                <label for="utilization" class="col-md-4 col-form-label text-md-right">{{ __('Utilization') }}</label>
                                <div class="col-md-6">
                                    <input type="number" style="width: 150px" placeholder = "" "id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>
                                </div>
                            </div> --}}
                        </div>
                        <div class="clear" style="clear: both"></div>
                        <div class="col-md-12">
                            <p align="center" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                                {{-- <button class="btnGreenForm" style="background-color: rgb(147, 147, 252); border-radius:10px" >Save</button> --}}
                                <a href="{{ route('home') }}" class="btnCancelForm">Cancel</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="category"]').on('change',function(){
            var categoryID = jQuery(this).val();
               if(categoryID)
               {
                    jQuery.ajax({
                        url : 'requisition/getitems/' +categoryID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                       {
                            console.log(data);
                            jQuery('select[name="item"]').empty();
                            jQuery.each(data, function(key,value){
                            $('select[name="item"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                  });
                }else{
                    $('select[name="item"]').empty();
                }
            });
    });
</script>
  
@endsection