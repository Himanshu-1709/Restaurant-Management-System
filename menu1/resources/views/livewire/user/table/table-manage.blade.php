<div>
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #qrcode,
        #qrcode * {
            visibility: visible;
        }

        #qrcode {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
@if (session()->has('message'))
   <div class="alert alert-success">
      {{ session('message') }}
   </div>
   @endif
   @if (session()->has('error'))
   <div class="alert alert-danger">
      {{ session('error') }}
   </div>
   @endif
   <div class="alert alert-warning alert-dismissible alert-alt fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        <span>
            <i class="fa-solid fa-xmark"></i>
        </span>
    </button>
    <strong>Warning!</strong> If you delete a table, then all orders inside it should be deleted.
</div>
    <div class="row">
        @foreach($tables as $table)
        <div class="col-xl-2 col-xxl-6 col-sm-4 sp15">
            <a href="#" wire:click="openModal({{$table->id}})">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h4 class="mb-0">{{$table->table_no}}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

        <!-- center modal -->
        <div wire:ignore.self class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Table Manage</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updateTable">
                            <div class="col-xl-12 col-sm-12">
                                <div class="setting-input">
                                    <label for="exampleInputtext" class="form-label">Table Number</label>
                                    <input type="hidden" class="form-control" wire:model="table_id" id="exampleInputtext" placeholder="1" value="{{$table_id}}">
                                    <input type="number" class="form-control" wire:model="table_no" id="exampleInputtext" placeholder="1" value="{{$table_no}}">
                                    @error('table_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                    </div>
                    <div id="qrcode" class="text-center">
                        <img src="{{$qrCodeImage}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning light btn-sm" wire:click="menuOpen({{$table_no}})" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="menuOpen">Open Menu <i class="bi bi-list"></i></span>
                            <span wire:loading wire:target="menuOpen">Loading...</span>
                        </button>
                        <button type="button" class="btn btn-danger light btn-sm" wire:click="tableDelete({{$table_id}})" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="tableDelete">Delete It <i class="bi bi-trash"></i></span>
                            <span wire:loading wire:target="tableDelete">Loading...</span>
                        </button>
                        <button type="button" class="btn btn-info light btn-sm" wire:click="tableQrPrint({{$table_no}})" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="tableQrPrint">Print QR <i class="bi bi-printer"></i></span>
                            <span wire:loading wire:target="tableQrPrint">Loading...</span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm" wire:loading.attr="disabled" wire:target="updateTable">
                            <span wire:loading wire:target="updateTable">Loading...</span>
                            <span wire:loading.remove wire:target="updateTable">Save Changes</span>
                        </button>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-xxl-6 col-sm-4 sp15">
            <a href="#" wire:click="tableadd">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h4 class="mb-0">+</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
   
</div>
<script>
  window.addEventListener('openPagamentoLongModal', event => {
      $("#exampleModalCenter").modal('show');
  })
  window.addEventListener('closePagamentoLongModal', event => {
      $("#exampleModalCenter").modal('hide');
  })
</script>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('printDocument', function () {
            // Add JavaScript code to open the printer here
            window.print();
        });
    });
</script>