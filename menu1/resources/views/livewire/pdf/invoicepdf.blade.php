<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @php
    $itemCount = $ongoingorder->orderItems->count();
    $finel = $itemCount * 0.9 + 15 . 'cm';
    @endphp

    <style>
        @page {
            margin: 1px;

            size: 6.35cm {
                    {
                    $finel
                }
            }

            ;
        }

        body {
            /* max-width: 2.5in;
            font-family: Arial, sans-serif; */
            font-size: 10px;
        }

        .title {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        thead {
            border-bottom: 2px solid #ddd;
        }

        th {
            text-align: left;
            padding-bottom: 8px;
        }

        .total {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 10px;
        }

        .qty {
            display: flex;
            justify-content: space-between;
            margin-left: 6px;
        }

        .grand-total {
            display: flex;
            text-align: right;

            justify-content: space-between;
            margin-top: 10px;
        }

        .Total,
        .rupee {
            font-weight: 900;
            margin-right: 6px;
            /* Adjust the margin for better spacing */
        }
    </style>
</head>

<body>
    @php
    $json_decode_user = json_decode($ongoingorder->user, true);
    $total = 0;
    @endphp
    <div class="title">
        <h6 class="">DESI PALACE MULTI <BR> CUISINE RESTRO</h6>
        <p style="font-size: 10px;">80, FEET ROAD, NR, SUBHAM HOSPITAL, <br> SORATHIYAWADI CIRCLE, RAJKOT. <BR> MO.
            8488885535</p>
        <hr>
    </div>
    <p style="margin-left: 6px; padding: 0px;">Name: {{$json_decode_user['name']}}</p>
    <hr>
    <table>
        <tr>
            <td class="p-0 m-0"><span>Date: 29/12/2023</span></td>
            <td class="p-0 m-0"><span class="Token">Dine In:1</span></td>
        </tr>
        <tr>
            <td class="p-0 m-0"><span>12:09</span></td>
        </tr>
        <tr>
            <td class="p-0 m-0"><span>Cashier: 1</span></td>
            <td class="p-0 m-0"><span>Bill No.:{{$ongoingorder->id}}</span></td>
        </tr>
        <tr>
            <td class="p-0 m-0"><span class="Token">Token No.:1</span></td>
        </tr>
    </table>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty.</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ongoingorder->orderItems as $index => $list)
            <tr>
                <td>{{$list->item->item_name}}</td>
                <td>{{$list['qty']}}</td>
                <td>{{$list->item->item_price}}</td>
                @php
                $amount = $list->item->item_price * $list['qty'];
                $total += $amount;
                @endphp
                <td> {{number_format($amount, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="total">
        <div class="qty">
            <span>Total Qty: {{$itemCount}}</span>&nbsp;&nbsp;
            <span>GST: 450</span>&nbsp;&nbsp;
            <span>Sub Total: {{number_format($total, 2)}}</span>&nbsp;&nbsp;
        </div>

        <div class="sub">
            <hr>
            <div class="grand-total">
                <span class="Total">Grand-total:</span>
                <span class="rupee">{{ number_format($total, 2) }}</span>
            </div>

            <p class="title"> THANK YOU VISIT AGAIN....</p>
        </div>
    </div>
</body>

</html>