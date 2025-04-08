<div>
<?php
    // Get the full URL using the url helper function
    $fullUrl = url('/');

    // Parse the full URL to extract the domain base URL
    $parsedUrl = parse_url($fullUrl);

    // Get the domain base URL
    $domainBaseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
?>
<form wire:submit.prevent="register">
    <div class="mb-3">
        <label class="mb-1"><strong>Name</strong></label>
        <input type="text" class="form-control" placeholder="FoodDesk" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        <!-- <span class="text-info">Your menu link will be: {{ $domainBaseUrl }}/menu/{{ $name }}</span> -->
        <span class="text-info">Your menu link will be: {{ $domainBaseUrl }}/menu/{{ Str::slug($name, '-') }}</span>

    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Email Address</strong></label>
        <input type="email" class="form-control" placeholder="hello@example.com" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="mb-1"><strong>Password</strong></label>
        <input type="password" class="form-control" placeholder="Password" wire:model="password">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block shadow" wire:loading.attr="disabled" wire:target="register">
            <span wire:loading wire:target="register">Loading...</span>
            <span wire:loading.remove wire:target="register">Register</span>
        </button>
    </div>
</form>
</div>
