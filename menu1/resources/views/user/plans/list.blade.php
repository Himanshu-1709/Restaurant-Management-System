@extends('user/layout')
@section('page_title','Plans')
@section('dashboard_select','mm-active')
@section('container') 
<div class="row">
<livewire:user.plan.plan-list/>

</div>

@endsection