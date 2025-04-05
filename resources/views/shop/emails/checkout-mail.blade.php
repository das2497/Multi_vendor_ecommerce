<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: orangered;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            color: #fff;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            background-color: greenyellow;
            border-radius: 8px;
            padding: 10px;
        }

        .title h2 {
            margin: 0;
            color: rgb(0, 0, 0);
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .table th {
            background-color:rgb(221, 221, 221);
        }

        .table td {
            text-align: center;
            background-color: #ffffff;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="https://delivery.danushkasandagiri.com/shop/images/logo.jpg" width="200" alt="">
            <h1>Mr.Delivery</h1>
        </div>
        <div class="title">
            <h2 class="alert-heading">Thank you for your order! Your order has been placed successfully.</h2>
        </div>
        <div class="message">
            <p>Dear {{$details['customer_name']}}, your order details.</p>
            <p>Customer Id : {{$details['customer_id']}}</p>
            <p>Order Id : {{$details['order_id']}}</p>
            <p>Date : {{$details['date']}}</p>
            <p>Time : {{$details['time']}}</p>
            <p>Total : Rs.{{$details['total']}}</p>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details['cart_items'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['qty'] * $item['price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>