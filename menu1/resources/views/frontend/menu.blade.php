<!DOCTYPE html>
<html translate="no">
<head>
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link href="{{asset('user/assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>	

  <title>Horizontal Category Navigation</title>
  <style>
    .horizontal-scroll {
      overflow-x: auto;
      white-space: nowrap;
    }
    .category-item {
      display: inline-block;
      padding: 10px;
      margin: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    body {
    user-select: none;
    }
    .bg-primary, .btn-primary{
        background-color:#FC8019 !important;
    }
  </style>
     @livewireStyles
</head>
<body>

@if(session()->has('message'))
            
            <div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
                    <p class="mb-0">
                    {{session('message')}}!
                    </p>
                    <i class="fa fa-fw fa-times ms-2"></i>
                  </div>
            @endif 

<livewire:frontend.user-items :user_id="$user->id"/>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@livewireScripts
</body>
</html>
