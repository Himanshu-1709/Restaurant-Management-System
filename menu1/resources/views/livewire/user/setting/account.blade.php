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
    <div class="card border-2">
        <div class="card-body">
            <form wire:submit.prevent="updateProfile" enctype='multipart/form-data'>
                <h3 class="mb-4">Account</h3>
                <p class="fs-18">Photo Profile</p>
                <div class="setting-img d-flex align-items-center mb-4">
                    <div class="avatar-upload d-flex align-items-center">
                        <div class=" change position-relative d-flex">
                            <div class="avatar-preview">
                                @if ($logo)
                                <div id="imagePreview" style="background-image: url('{{ $logo->temporaryUrl() }}');">
                                </div>
                                @else
                                <div id="imagePreview"
                                    style="background-image: url('{{ asset('user/assets/logos/'.auth()->user()->logo) }}');">
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="change-btn d-flex align-items-center flex-wrap">
                            <input type='file' class="form-control" wire:model="logo" id="imageUpload"
                                accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload" class="dlab-upload">Choose File</label>
                            <a href="javascript:void" class="btn remove-img ms-2">Remove</a>
                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-xl-5 ms-2 col-sm-6">
                <div class="setting-input">
                    <label for="name" class="form-label">Username </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="FoodDesk"
                        wire:model="name">
                    <label class="text-danger" style="font-size: 15px;">(If you change username your menu link will be
                        changed!)</label>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xl-6 col-sm-6">
                <div class="setting-input">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="fooddesk@mail.com"
                        wire:model="email" disabled>
                </div>

            </div>
            <div class="col-xl-11 ms-2 col-sm-12">
                <div class="setting-input">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="••••••••"
                        wire:model="password">
                </div>
            </div>
            <div class="col-xl-11 col-sm-12">
                <!-- <a href="javascript:void(0);" class="btn btn-primary float-end w-50 btn-md">Save Setting</a> -->
                <button type="submit" class="btn btn-primary float-end mb-5 w-50 btn-md" wire:loading.attr="disabled"
                    wire:target="register">
                    <span wire:loading wire:target="updateProfile">Loading...</span>
                    <span wire:loading.remove wire:target="updateProfile">Save Setting</span>
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            readURL(document.getElementById('imageUpload'));
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.remove-img').on('click', function () {
        var imageUrl = "/user/assets/images/no-img-avatar.png";
        $('.avatar-preview, #imagePreview').removeAttr('style');
        $('#imagePreview').css('background-image', 'url(' + imageUrl + ')');
    });
</script>