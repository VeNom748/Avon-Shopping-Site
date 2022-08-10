<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="./css/CheckOut.css">
    <link rel="stylesheet" href="./css/Footer.css">
    <link rel="stylesheet" href="./css/payment.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add your address</title>
</head>

<body>
    <?php
        require("./components/header.php")
    ?>
    <div class="Home">
        <div class="w_80">
            <div class="payment-box">
                <h1 class="pheading">Please Complete The Payment</h1>
                <div class="container">
                    <div class="row">
                        <!-- You can make it whatever width you want. I'm making it full width
        on <= small devices and 4/12 page width on >= medium devices -->
                        <div class="col-xs-13 col-md-5">
                            <!-- CREDIT CARD FORM STARTS HERE -->
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table">
                                    <div class="row display-tr">
                                        <h3 class="panel-title display-td p-0 ">Payment Details</h3>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" id="payment-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="cardNumber">CARD NUMBER</label>
                                                    <div class="input-group">
                                                        <input type="tel" class="form-control" name="cardNumber"
                                                            placeholder="Valid Card Number" autocomplete="cc-number"
                                                            required autofocus />
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-credit-card"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7 col-md-7">
                                                <div class="form-group">
                                                    <label for="cardExpiry"><span
                                                            class="hidden-xs">EXPIRATION</span><span
                                                            class="visible-xs-inline">EXP</span> DATE</label>
                                                    <input type="tel" class="form-control" name="cardExpiry"
                                                        placeholder="MM / YY" autocomplete="cc-exp" required />
                                                </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5 pull-right">
                                                <div class="form-group">
                                                    <label for="cardCVC">CV CODE</label>
                                                    <input type="tel" class="form-control" name="cardCVC"
                                                        placeholder="CVC" autocomplete="cc-csc" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="couponCode">COUPON CODE</label>
                                                    <input type="text" class="form-control" name="couponCode" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn_proceed" type="submit">

                                                    Pay Online

                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- CASH ON DILIVERY  -->
                                    <a href="confirm_order">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn_proceed" type="submit">

                                                    Cash on Delivery

                                                </button>
                                            </div>
                                        </div>
                                    </a>


                                </div>
                            </div>
                            <!-- CREDIT CARD FORM ENDS HERE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Footer">
            <?php require("./components/Footer.php") ?>
        </div>
    </div>
    <!-- payment box end  -->
</body>

</html>