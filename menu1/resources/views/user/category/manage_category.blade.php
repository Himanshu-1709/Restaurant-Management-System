@extends('user/layout')
@section('page_title','Category List')
@section('category_list_select','mm-active')
@section('container') 
<div class="row">
<div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                        <livewire:user.category :category_id="$category_id" :category_name="$category_name" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal -->
@endsection