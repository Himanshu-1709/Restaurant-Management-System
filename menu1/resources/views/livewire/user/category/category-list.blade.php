<div>
   <div class="row">
      <div class="col-12">
      <div class="alert alert-warning alert-dismissible alert-alt fade show">
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
								<span>
									<i class="fa-solid fa-xmark"></i>
								</span>
							</button>
							<strong>Warning!</strong> If you delete a category, then all items inside it should be deleted.
						</div>
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Category List</h4>
               <a href="{{route('user.category.add')}}" class="btn btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
               </span>Add Category</a>
            </div>
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center">
                <!-- <select class="form-control default-select me-3 ms-0 mb-4 border" wire:change="delete">
                    <option value="" selected disabled>Select Action</option>
                    <option value="delete">Mark as trash</option>
                </select> -->
            </div>
            </div>
            <form wire:submit.prevent="render">
    <div class="block-options">
        <div class="row">
            <div class="col-3">
                <input wire:model="search" class="typeahead form-control" name="search" type="text">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</form>
               <div class="table-responsive">
               <table class="table table-striped">
                     <thead>
                        <tr>
                           <th></th>
                           <th>Category Name</th>
                           <th>Order</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($category as $key => $list)
                        <tr>
                           <td>
                           <!-- <div class="form-check style-3 me-3">
                                            <input class="form-check-input" type="checkbox" value="{{$list->id}}" wire:model="checked">
                                        </div> -->
                           </td>
                           <td>{{$list->category_name}}</td>
                           <td>{{$list->orderCount}}</td>
                           <td>
                              <div class="d-flex">
                                 <a href="{{route('user.category.edit',$list->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                  <a id="deleteLink" href="{{route('user.category.delete',$list->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> 
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {{$category->links("pagination::bootstrap-4")}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>