<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/confirm_order.css">
    <link rel="stylesheet" href="toste.css">
    <title>Confirm Order</title>
</head>

<body>
    <div class="popup_box">

    </div>
    <div class="bg-text">
        <div class="content">
            <h1>Congratulations Order Placed</h1>
    
            <a class="product_page_btn" href="index.php">Back to Home</a>
        </div>
    </div>

    <script src="toste.js"></script>
    <script>
        new Toast({
            message: 'Order Placed Successfully',
            type: 'success'
        })
    </script>
</body>

</html>