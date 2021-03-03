@extends('layouts.new_app')
@section('content')
<div class="col-md-10 col-sm-9 col-xs-12">
    <div class="side-body" style="padding-top:2%">
       <div class="container-fluid">
          <!-- PAGE DESCRIPTION HEADER -->
          <div class="header">
             <h3>Add New Requisition</h3>
          </div>
          <!-- END OF PAGE DESCRIPTION HEADER -->
          <div class="content-box">
             <div class="col-md-8 col-sm-12" style="padding:0px">
                <!-- FORM -->
                <form method="POST" action="">
                  <div class="form-box">
                     <label for="category">Category:</label>
                     <select name ="category" placeholder="please select "class="form-control">  
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select><br>
                    
                    
                     <label for="exampleInputEmail1">Description:</label>
                     <textarea name="description" placeholder = "e.g brief description of the requisition"id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>
                     <label for="exampleInputEmail1">quantity</label>
                     <input type="number" placeholder = "" "id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>

                     
                     <div class="clear" style="clear: both"></div>
                     <div class="col-md-12">
                        <p align="right">
                           <button class="btnGreenForm" >Save</button>
                           <a href="{{ route('home') }}" class="btnCancelForm">Cancel</a>
                        </p>
                     </div>
                  </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>
 @endsection