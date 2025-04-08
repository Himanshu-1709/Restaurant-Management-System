@extends('user/layout')
@section('page_title','Item Manage')
@section('item_form_select','mm-active')
@section('container') 
<div class="row">
<div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                        <livewire:user.item :item_id="$id" :cat_id="$cat_id" :item_name="$item_name" :item_desc="$item_desc"  :item_price="$item_price"  />
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal -->
@endsection