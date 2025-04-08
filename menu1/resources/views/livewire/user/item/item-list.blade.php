<div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Items List</h4>
               <a href="{{route('user.items.add')}}" class="btn btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
            </span>Add Item</a>
            </div>
            
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center">
                <!-- <select class="form-control default-select me-3 ms-0 mb-4 border" wire:change="delete">
                    <option value="" selected disabled>Select Action</option>
                    <option value="complete">Mark as trash</option>
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
                        <th>Item Name</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($item as $key => $list)
                     <tr>
                        <td>
                           <!-- <div class="form-check style-3 me-3">
                              <input class="form-check-input" type="checkbox" value="{{$list->id}}" wire:model="checked">
                           </div> -->
                        </td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->item_name}}</td>
                        <td>
                           <div class="d-flex">
                              <a href="{{route('user.items.edit',$list->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                              <!-- <a id="deleteLink" href="{{route('user.items.delete',$list->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
                           </div>
                        </td>
                     </tr>
                     @endforeach
                     </tbody>
                  </table>
                  {{$item->links("pagination::bootstrap-4")}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>