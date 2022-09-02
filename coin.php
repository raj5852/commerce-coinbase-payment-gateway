<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.commerce.coinbase.com/charges/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$post = array(
    "name" => "Product name",
    "description" => "Product Decription",
    "local_price" => array(
        'amount' => '20',
        'currency' => 'USD'
    ),
    "pricing_type" => "fixed_price",
    "metadata" => array(
        'customer_id' => '123',
        'name' => 'Raj'
    )
);

$post = json_encode($post);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "X-Cc-Api-Key: <API key>"; //Add Api Key in here
$headers[] = "X-Cc-Version: 2018-03-22";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);
$response = json_decode($result,true);
// print_r($response['data']['addresses']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: #B1EA86;
            padding: 30px 0
        }

        a {
            text-decoration: none;
        }

        .pricingTable {
            text-align: center;
            background: #fff;
            margin: 0 -15px;
            box-shadow: 0 0 10px #ababab;
            padding-bottom: 40px;
            border-radius: 10px;
            color: #cad0de;
            transform: scale(1);
            transition: all .5s ease 0s
        }

        .pricingTable:hover {
            transform: scale(1.05);
            z-index: 1
        }

        .pricingTable .pricingTable-header {
            padding: 40px 0;
            background: #f5f6f9;
            border-radius: 10px 10px 50% 50%;
            transition: all .5s ease 0s
        }

        .pricingTable:hover .pricingTable-header {
            background: #ff9624
        }

        .pricingTable .pricingTable-header i {
            font-size: 50px;
            color: #858c9a;
            margin-bottom: 10px;
            transition: all .5s ease 0s
        }

        .pricingTable .price-value {
            font-size: 35px;
            color: #ff9624;
            transition: all .5s ease 0s
        }

        .pricingTable .month {
            display: block;
            font-size: 14px;
            color: #cad0de
        }

        .pricingTable:hover .month,
        .pricingTable:hover .price-value,
        .pricingTable:hover .pricingTable-header i {
            color: #fff
        }

        .pricingTable .heading {
            font-size: 24px;
            color: #ff9624;
            margin-bottom: 20px;
            text-transform: uppercase
        }

        .pricingTable .pricing-content ul {
            list-style: none;
            padding: 0;
            margin-bottom: 30px
        }

        .pricingTable .pricing-content ul li {
            line-height: 30px;
            color: #a7a8aa
        }

        .pricingTable .pricingTable-signup a {
            display: inline-block;
            font-size: 15px;
            color: #fff;
            padding: 10px 35px;
            border-radius: 20px;
            background: #ffa442;
            text-transform: uppercase;
            transition: all .3s ease 0s
        }

        .pricingTable .pricingTable-signup a:hover {
            box-shadow: 0 0 10px #ffa442
        }

        .pricingTable.blue .heading,
        .pricingTable.blue .price-value {
            color: #4b64ff
        }

        .pricingTable.blue .pricingTable-signup a,
        .pricingTable.blue:hover .pricingTable-header {
            background: #4b64ff
        }

        .pricingTable.blue .pricingTable-signup a:hover {
            box-shadow: 0 0 10px #4b64ff
        }

        .pricingTable.red .heading,
        .pricingTable.red .price-value {
            color: #ff4b4b
        }

        .pricingTable.red .pricingTable-signup a,
        .pricingTable.red:hover .pricingTable-header {
            background: #ff4b4b
        }

        .pricingTable.red .pricingTable-signup a:hover {
            box-shadow: 0 0 10px #ff4b4b
        }

        .pricingTable.green .heading,
        .pricingTable.green .price-value {
            color: #40c952
        }

        .pricingTable.green .pricingTable-signup a,
        .pricingTable.green:hover .pricingTable-header {
            background: #40c952
        }

        .pricingTable.green .pricingTable-signup a:hover {
            box-shadow: 0 0 10px #40c952
        }

        .pricingTable.blue:hover .price-value,
        .pricingTable.green:hover .price-value,
        .pricingTable.red:hover .price-value {
            color: #fff
        }

        @media screen and (max-width:990px) {
            .pricingTable {
                margin: 0 0 20px
            }

        }

        @media screen and (min-width:1000px) {
            .modal-dialog {
                width: 450px;
            }

        }
    </style>
</head>

<body>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title  text-center">Crypto Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="d-flex">
                        <div> <img style="width: 30px;" src="https://commerce.coinbase.com/landing/asset-symbols/btc.png" alt=""> </div>
                        <p style="margin-left: 5px;"> <?php echo $response['data']['addresses']['bitcoin'] ?>  </p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div> <img style="width: 30px;" src="https://commerce.coinbase.com/landing/asset-symbols/eth.png" alt=""> </div>
                        <p style="margin-left: 5px;"><?php echo $response['data']['addresses']['ethereum'] ?>  </p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div> <img style="width: 30px;" src="https://commerce.coinbase.com/landing/asset-symbols/usdc.png" alt=""> </div>
                        <p style="margin-left: 5px;"><?php echo $response['data']['addresses']['usdc'] ?> </p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div> <img style="width: 30px;" src="https://commerce.coinbase.com/landing/asset-symbols/usdt.png" alt=""> </div>
                        <p style="margin-left: 5px;"><?php echo $response['data']['addresses']['tether'] ?>  </p>
                    </div>
                    <hr>
                    <hr>
                    <div class="d-flex">
                        <div> <img style="width: 30px;" src="https://commerce.coinbase.com/landing/asset-symbols/doge.png" alt=""> </div>
                        <p style="margin-left: 5px;"> <?php echo $response['data']['addresses']['dogecoin'] ?> </p>
                    </div>
                    <hr>
                    <hr>
                    <div class="d-flex">
                        <div> <img style="width: 30px;" src="https://commerce.coinbase.com/landing/asset-symbols/ltc.png" alt=""> </div>
                        <p style="margin-left: 5px;"> <?php echo $response['data']['addresses']['litecoin'] ?></p>
                    </div>
                    <hr>
                </div>



            </div>
        </div>
    </div>

    <div class="demo">
        <div class="container">
            <div class="row">

                <center>
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable green">
                            <div class="pricingTable-header">
                                <i class="fa fa-briefcase"></i>
                                <div class="price-value"> $20.00 <span class="month">per month</span> </div>
                            </div>
                            <h3 class="heading">Business</h3>
                            <div class="pricing-content">
                                <ul>
                                    <li><b>60GB</b> Disk Space</li>
                                    <li><b>60</b> Email Accounts</li>
                                    <li><b>60GB</b> Monthly Bandwidth</li>
                                    <li><b>15</b> subdomains</li>
                                    <li><b>20</b> Domains</li>
                                </ul>
                            </div>
                            <div class="pricingTable-signup">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal">Buy</a>
                            </div>
                        </div>
                    </div>
                </center>


            </div>
        </div>
    </div>
</body>

</html>