@extends('user/layout')
@section('page_title','Item List')
@section('items_list_select','mm-active')
@section('container') 
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
<livewire:user.item.item-list/>
<!--                         

<script>
    document.getElementById('deleteLink').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        // Show the SweetAlert popup
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "Yes," trigger the route deletion
                window.location.href = this.getAttribute('href');
            }
        });
    });
</script> -->

@endsection