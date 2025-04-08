<div>
    <style>
        .error {
            color: red;
        }
    </style>
    @if (session()->has('success'))
    <div class="col-xl-12">
        <div class="alert alert-success alert-dismissible alert-alt fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                <span>
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </button>
            <strong>Success!</strong> {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="card mb-0">
        <div class="card-body">
            <form wire:submit.prevent="updateDiscount" enctype='multipart/form-data'>
                <h3 class="mb-4">Discount</h3>
                <div class="row">
                    <label>
                        <input type="radio" name="radioGroup" id="radioButton1" onclick="toggleFields('percentage')">
                        Percentage
                    </label>

                    <label>
                        <input type="radio" name="radioGroup" id="radioButton2" onclick="toggleFields('updateDiscount')">
                        Payment
                    </label>
                    <div class="col-xl-12 col-sm-12">
                        <div class="setting-input" id="percentageField">
                            <label for="percentage" class="form-label">Percentage</label>
                            <input type="text" id="percentage" wire:model="percentage" class="form-control"
                                name="percentage" placeholder="10%" required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-sm-12">
                        <div class="setting-input" id="paymentField" style="display: none;">
                            <label for="payment" class="form-label">Payment</label>
                            <input type="text" wire:model="payment" id="payment" class="form-control" name="payment"
                                placeholder="1000 ₹" required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-sm-12">
                        <!-- <a href="javascript:void(0);" class="btn btn-primary float-end w-50 btn-md">Save Setting</a> -->
                        <button type="submit" class="btn btn-primary float-end w-50 btn-md" wire:loading.attr="disabled"
                            wire:target="updateDiscount">
                            <span wire:loading wire:target="updateDiscount">Loading...</span>
                            <span wire:loading.remove wire:target="updateDiscount">Save Setting</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleFields(type) {
        if (type === 'percentage') {
            document.getElementById('percentageField').style.display = 'block';
            document.getElementById('paymentField').style.display = 'none';
        } else if (type === 'payment') {
            document.getElementById('percentageField').style.display = 'none';
            document.getElementById('paymentField').style.display = 'block';
        }
    }
</script>