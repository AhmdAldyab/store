<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Print order</title>
</head>
<body>
    <div class="container p-5 text-center" style="background-color: #EEE">
        <h2>welcome {{ auth()->user()->name }}</h2>
        <ol class="list-group list-group-numbered">
            @php
                $sum = 0;
            @endphp
            @foreach ($orders as $order)
                <li class="list-group-item">
                    @php
                        $sum += $order->item->price_sell * $order->quantity
                    @endphp
                    {{$order->item->name}} : {{$order->item->price_sell * $order->quantity}} $
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$order->quantity}} {{$order->item->unit}}
                </li>
            @endforeach
            <li class="list-group-item">
                Total : {{$sum}} $
            </li>
        </ol>

        <button onclick="window.print()" class="btn btn-primary ">Print this order</button>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
