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