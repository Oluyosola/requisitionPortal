@extends('layouts.new_app')
@section('content')
@include('inc.sidebar')   
<div style="margin-top: 100px">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header text-center" style="background-color: #0077ad"><h4>{{ __('Requisition Form') }}</h4></div>
                @include('inc.message')   
                <div class="card-body">
                    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
                    <form method="POST" action="{{route('store_new_requisition') }} ">
                        @csrf
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <thead class="thead-light">
                            <tr>
                                <th>Category</th>
                                <th>Item</th>
                                <th>description</th>
                                <th colspan="2">Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tr>
                                <td>
                                    <select name="moreFields[0][category_id]" class="form-control category-select" id="category-select0" onchange="onCategorySelectChange(0)">
                                        <option value="">--- Select category ---</option>
                                         @foreach ($categories as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="moreFields[0][item_id]" class="form-control item-select" id="item-select0">
                                        <option>--item--</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="moreFields[0][description]" rows="4" cols="50" maxlength="50" placeholder = "e.g brief description of the requisition"id="input" class="form-control description-textarea" value=""  title=""></textarea><br>
                                </td>
                                <td> 
                                    <input type="number" name="moreFields[0][quantity]" step="0.01" style="width: 150px" placeholder = "" id="input" cols="30" rows="10" class="form-control quantity-input" value="" required="required" title=""></textarea><br>
                                </td>
                                <td>
                                    <select name="moreFields[0][item_unit]" class="form-control unit-select">
                                        <option value="">--unit--</option>
                                        @foreach($item_unit as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
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
                
                                <a href="{{ route('home') }}" class="btn btn-danger btnCancelForm" style="background-color: #003765">Cancel</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function () {
        });
    function onCategorySelectChange(id){
        var categoryID = jQuery('#category-select' + id).val();
        console.log('tableID =', id);

        console.log('categoryID =', categoryID);
            if(categoryID)
            {
            jQuery.ajax({
                    url : 'requisition/getitems/' +categoryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                {
                console.log(data);
                jQuery('#item-select' + id).empty();
                jQuery.each(data, function(key,value){
                $('#item-select' + id).append('<option value="'+ key +'">'+ value +'</option>');
                });
                },
                error:function(data)
                {
                    console.log(data);
                }
            });
            }else{
                jQuery('#item-select' + id).empty();
            }
        }

</script>
<script type="text/javascript">
    var i = 0;
$("#add-btn").click(function(){
    ++i;
 
    $("#dynamicAddRemove").append('<tr><td>'+
      '<select name="moreFields['+ i +'][category_id]" class="form-control" id="category-select'+ i + '" onchange="onCategorySelectChange('+ i+')">'+
      '<option value="">--- Select category ---</option>'+
      '<?php $categories = App\Models\Category::get()->pluck("name", "id"); foreach($categories as $key => $value) { ?>'+
      '<option value="'+'<?= $key; ?>'+'">'+'<?= $value; ?>'+'</option>'+'<?php }?>'+'</select>'+
      '</td><td>'+
      '<select name="moreFields['+ i + '][item_id]" class="form-control" id="item-select'+ i + '">'+
      '<option>--item--</option></select>'+
      '</td><td><textarea name="moreFields[' + i + '][description]" rows="4" cols="50" maxlength="50" placeholder="e.g brief description of the requisition" id="input" cols="30" rows="10" class="form-control" value="" title=""></textarea>'+
      '<br></td><td> <input type="number" name="moreFields[' + i + '][quantity]" step="0.01" style="width: 150px" placeholder="" id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea>'+
      '<br></td><td><select name="moreFields['+ i + '][item_unit]" class="form-control unit-select">'+
                                       '<option>--unit--</option>'+
                                       '<?php $item_unit = App\Models\QuantityUnit::get()->pluck("name", "id"); foreach($item_unit as $key=>$value){ ?>'+
                                           '<option value="'+'<?= $key; ?> '+'">'+'<?=$value; ?> '+'</option>'+'<?php }?>'+'</select>'+

                                    
                                '</td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
    --i;
$(this).parents('tr').remove();
    
});  
 </script> 


   
@endsection