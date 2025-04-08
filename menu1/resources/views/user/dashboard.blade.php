@extends('user/layout')
@section('page_title','User - Dashboard')
@section('dashboard_select','mm-active')
@section('container') 
@if (session()->has('success'))
<div class="col-xl-6">
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
@if (session()->has('danger'))
<div class="col-xl-6">
    <div class="alert alert-danger alert-dismissible alert-alt fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            <span>
                <i class="fa-solid fa-xmark"></i>
            </span>
        </button>
        <strong>Error!</strong> {{ session('danger') }}
    </div>
</div>
@endif
<livewire:user.dashboard/>
@endsection
