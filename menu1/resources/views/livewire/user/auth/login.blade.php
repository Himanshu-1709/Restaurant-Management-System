<div>
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            <span>
                <i class="fa-solid fa-xmark"></i>
            </span>
        </button>
        <strong>Email!</strong> {{ session('success') }}
    </div>
@endif
@if (session()->has('message') != '' || $errors->any())
    <div class="alert alert-{{$style}} alert-dismissible alert-alt fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            <span>
                <i class="fa-solid fa-xmark"></i>
            </span>
        </button>
        <strong>Message!</strong> {{ session('message') ?? $errors->first('message') }}
        @if($resendmail)
        <a wire:click="resend_verification" wire:loading.attr="disabled" class="text-blue">
            Resend
            <span wire:loading wire:target="resend_verification">(Loading...)</span>
        </a>
        @endif
    </div>
@endif
<!-- @error('error') <span class="text-danger">{{ $message }}</span> @enderror -->
<form wire:submit.prevent="login">
    <div class="mb-3">
        <label class="mb-1"><strong>Email Address</strong></label>
        <input type="email" class="form-control" wire:model="email" placeholder="hello@example.com">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Password</strong></label>
        <input type="password" class="form-control" wire:model="password" placeholder="password">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="row d-flex justify-content-between mt-4 mb-2">
        <div class="mb-3">
            <a href="page-forgot-password.html">Forgot Password?</a>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block shadow" wire:loading.attr="disabled" wire:target="login">
            <span wire:loading wire:target="login">Loading...</span>
            <span wire:loading.remove wire:target="login">Login</span>
        </button>
    </div>
</form>
</div>
