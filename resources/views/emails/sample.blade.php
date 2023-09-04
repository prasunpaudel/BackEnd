<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #ffffff; max-width: 600px; margin: 0 auto;">
        <tr>
            <td align="center" style="padding: 40px 0; text-align: center;">
                <img src="http://localhost:8000/site/images/logo.png" alt="Your Logo" width="150">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <h2>Your Order Has Been Placed!</h2>
                <p>Dear  {!! $content['name'] !!},</p>
                <p>Thank you for placing your order with us. Your order details are as follows:</p>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><strong> </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Order Date:</strong></td>
                        {{-- <td> {!! $content['date'] !!}</td> --}}
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <td>{{ Carbon::parse($content['date'])->addDays(2)->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Shipping Address:</strong></td>
                        <td> {!! $content['shippingAddress'] !!}</td>
                    </tr>
                </table>
                <p>Your order is confirmed and will be shipped to you shortly. You can track your order's status on this email.</p>
                <p>If you have any questions or need further assistance, please feel free to <a href="">contact us</a>.</p>
                <p>Thank you for choosing us!</p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #222; padding: 20px; color: #fff; text-align: center;">
                &copy; 2023 BeautyLife. All rights reserved.
            </td>
        </tr>
    </table>

</body>
</html>