<div class="col-md-10 col-sm-9 col-xs-12">
    <div class="side-body" style="padding-top:2%">
       <div class="container-fluid">
          <!-- PAGE DESCRIPTION HEADER -->
          <div class="header">
             <h3>Add New Company</h3>
          </div>
          <!-- END OF PAGE DESCRIPTION HEADER -->
          <div class="content-box">
             <div class="col-md-8 col-sm-12" style="padding:0px">
                <!-- FORM -->
                <form method="POST" action="">
                  <div class="form-box">
                     <label for="exampleInputEmail1">Name:</label>
                     <input type="text" name="name" placeholder="Name" id="input" class="form-control" value="" required="required" title=""> <br>
 
                     <label for="exampleInputEmail1">Domain or Website:</label>
                     <input type="text" name="website" placeholder="e.g www.company.com" id="input" class="form-control" value="" required="required" title=""> <br>
 
                     <label for="exampleInputEmail1">Description:</label>
                     <textarea name="description" placeholder = "e.g brief description of the company"id="input" cols="30" rows="10" class="form-control" value="" required="required" title=""></textarea><br>
                     
                     <label for="exampleInputEmail1">Address:</label>
                     <input type="text" name="address" placeholder="Kindly enter company's address" id="input" class="form-control" value="" required="required" title=""> <br>
 
                     <label for="exampleInputEmail1">Industry</label>
                     <select name ="industry_name" placeholder="please select company" id = "input" class="form-control" value="" required="required" title=""> <br>
                       <option value="">Select Industry</option>
                       @foreach($industry as $industries)
                         <option value="{{$industries->id}}">{{$industries->industry_name}}</option>
                       @endforeach
                      </select>  
                      
                     <div class="clear" style="clear: both"></div>
                     <div class="col-md-12">
                        <p align="right">
                           <button class="btnGreenForm" >Save</button>
                           <a href="{{ route('all_companies') }}" class="btnCancelForm">Cancel</a>
                        </p>
                     </div>
                  </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>