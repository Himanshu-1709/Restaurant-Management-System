<div>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .card {
      width: 100%;
      max-width: 500px; /* Set maximum width to 500px */
      margin: 50px auto; /* Center the card on the page */
      border-radius: 10px;
      overflow: hidden;
      background: #FC8019;
    }

    .card-header {
      height: 70px;
      border: 2px solid #FC8019;
      border-bottom: 2px dotted #FC8019;
      border-radius: 10px 10px 0 0;
      position: relative;
      text-align: center;
    }

    .card-header:before, .card-header:after {
      content: '';
      position: absolute;
      width: 24px;
      height: 24px;
      background: #fff;
      border-radius: 100%;
      bottom: -12px;
      border: 2px solid #FC8019;
      box-sizing: border-box;
    }

    .card-header:before { 
      left: -13px;
    }

    .card-header:after {
      right: -13px;
    }

    .card-body {
      height: auto;
      border: 2px solid #FC8019;
      border-top: none;
      border-radius: 0 0 10px 10px;
      text-align: center;
    }
    .table{
        text-align: center;  
    }

    /* Media query for screens with a width of 500px or less */
    @media (max-width: 500px) {
      .card {
        margin: 20px auto; /* Adjust margin for smaller screens */
      }
    }
    
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="text-center mt-5">
    <a href="{{route('menu',[$slug,'table' => $table])}}" type="button" class="btn btn-warning light btn-sm">New Order</a>
</div>
    <div class="card">
                 @php
               $json_decode_user = json_decode($ongoingorder->user,true);
               $total = 0;
               @endphp
        <div class="card-header">
        <img src="{{asset('user/assets/logos/'.auth()->user()->logo)}}" alt="" height="50px" width="50px" class="rounded-circle border border-white float-start"> 
            <h3 class="float-end">Order-Id:{{$ongoingorder->id}}</h3>
        </div>
      <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Qty</th>
                <th scope="col" class="text-right">Price</th>
              </tr>
            </thead>
            <tbody>
            @foreach($ongoingorder->orderItems as $index => $list)
        <tr>
            <th>{{ $index + 1 }}</th>
            <td class="text-left">{{$list->item->item_name}}</td>
            <td>{{$list['qty']}}</td>
            @php
                        $total += ($list->item->item_price)*$list['qty'];
                        @endphp
            <td>{{$list->item->item_price}}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td>Total:</td>
        <td>{{$total}} Rs.</td>
    </tr>

            </tbody>
          </table>
        <div class="text-center mt-5">
    <a href="{{route('user.invoicepdf')}}" type="button" class="btn btn-warning light btn-sm">Print</a>
</div>
      </div>
    </div>

</body>
</html>

</div>
