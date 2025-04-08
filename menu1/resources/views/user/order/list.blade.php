@extends('user/layout')
@section('page_title','Orders List')
@section('orders_list_select','mm-active')
@section('container') 
<div class="row">
<livewire:user.orders.order-list/>

</div>

@endsection