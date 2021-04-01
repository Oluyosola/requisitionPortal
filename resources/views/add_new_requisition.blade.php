@extends('layouts.new_app')
@section('content')
{{-- <div class="dashboard-header"> --}}
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #0077ad"><h4>{{ __('Requisition Form') }}</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{route('store_new_requisition') }} ">
                        @csrf
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
                                <th>Category</th>
                                <th>Item</th>
                                <th>description</th>
                                <th>Quantity</th>
                            </tr>
                        {{-- <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">         --}}
                                <tr>
                                <td>
                                <select name="moreFields[category][]" class="form-control category-select" id="input" >
                                    <option value="">--- Select category ---</option>
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                     @endforeach
                                </select>
                            </td>
                            {{-- </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-md-4 col-form-label text-md-right">{{ __('Select Item') }}</label>
                            <div class="col-md-6"> --}}
                                <td>
                                <select name="moreFields[item][]" class="form-control item-select" id="input">
                                    <option>--item--</option>
                                </select>
                            </td>
                            {{-- </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6"> --}}
                                <td><textarea name="moreFields[description][]" rows="4" cols="50" maxlength="50" placeholder = "e.g brief description of the requisition"id="input" class="form-control description-textarea" value="" required="required" title=""></textarea><br></td>
                            {{-- </div>
                        </div>
                        
                            <div class="form-group row">
                                <div class="control form-inline"> --}}
                                {{-- <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                                <div class="col-md-6"> --}}
                                    <td> <input type="number" name="moreFields[quantity][]" style="width: 150px" placeholder = "" id="input" cols="30" rows="10" class="form-control quantity-input" value="" required="required" title=""></textarea><br></td>
                                {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- <div class="form-group">
                                <label for="utilization" class="col-md-4 col-form-label text-md-right">{{ __('Utilization') }}</label>
                                <div class="col-md-6">
                                    <input type="number" style="width: 150px" placeholder = "" "id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>
                                </div>
                            </div> --}}
                        {{-- </div> --}}
                        <td>
                            <button type="button" class="btn btn-primary" name="add" id="add-btn">Add More</button>
                        </td>
                        </tr>
                    </table>
                        <div class="clear" style="clear: both"></div>
                        <div class="col-md-12">
                            <p align="center" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-primary" style="background-color: #0077ad">
                                    {{ __('Create') }}
                                </button>
                                {{-- <button class="btnGreenForm" style="background-color: rgb(147, 147, 252); border-radius:10px" >Save</button> --}}
                                <a href="{{ route('home') }}" class="btn btn-primary btnCancelForm" style="background-color: #003765">Cancel</a>
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
        jQuery('.category-select').on('change',function(){
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
                            jQuery('.item-select').empty();
                            jQuery.each(data, function(key,value){
                            $('.item-select').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                  });
                }else{
                    jQuery('.item-select').empty();
                }
            });
    });
</script>
<script type="text/javascript">
    // $(document).ready(function){
    var i = 0;
$("#add-btn").click(function(){
    ++i;
     // <td><input type="text" name="moreFields['+i+'][title]" placeholder="Enter title" class="form-control" /></td>
    $("#dynamicAddRemove").append('<tr><td><select name="moreFields[' + i + '][item]" class="form-control " id="input"><option>--item--</option></select></td><td><textarea name="moreFields[' + i + '][description]" rows="4" cols="50" maxlength="50" placeholder = "e.g brief description of the requisition"id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br></td><td> <input type="number" name="moreFields[' + i + '][quantity]" style="width: 150px" placeholder = "" id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
 </script> 
 {{-- <td><select name="moreFields['+i+'][category]" class="form-control" id="input"><option value="">--- Select category ---</option>@foreach ($categories as $key => $value) <option value="{{ $key }}">{{ $value }}</option>@endforeach</select></td> --}}


{{-- </script> --}}
   
@endsection