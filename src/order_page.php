<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- MDB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery CDN  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10" id="payment">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Your Orders</h3>
                    </div>
                    
                    <?php
                        $txt = "";
                        $total = 0;
                        foreach ($_SESSION["order"] as $key => $value) {
                            $total += $_SESSION["display"][$key]["price"]*$_SESSION["cart"][$key];
                            $txt .= "<div class='card rounded-3 mb-4'>
                            <div class='card-body p-4'>
                                <div class='row d-flex justify-content-between align-items-center'>
                                    <div class='col-md-2 col-lg-2 col-xl-2'>
                                        <img src=".$_SESSION["display"][$value["product_id"]]["image"]." alt=".$_SESSION["display"][$value["product_id"]]["product_name"]." width='100px' height='100px'>
                                    </div>
                                    <div class='col-md-3 col-lg-3 col-xl-3'>
                                        <p class='lead fw-normal mb-2'>".$_SESSION["display"][$value["product_id"]]["product_name"]."</p>
                                        <p>".$_SESSION["display"][$value["product_id"]]["company"]."</p>
                                    </div>
                                    <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                        <span class='m-2'>".$value["order_quantity"]."</span>
                                    </div>
                                    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                                        <h5 class='mb-0'>$".$_SESSION["display"][$value["product_id"]]["price"]*$value["order_quantity"]."</h5>
                                    </div>
                                    <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                                        <p class='text-danger' onclick='del_cart(".$key.")'>Status: ".$value["order_status"]."</p>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                        echo $txt;
                    ?>

                    <div class="card mb-4">
                        <div class="m-3">
                            <p class="mb-0 me-5 d-flex align-items-center float-end">
                                <span class="text-muted me-2"><b>Order total:</b></span> <span class="lead fw-normal"><b>$<?php
                                    echo $total;
                                ?></b></span>
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <a href="/index.php" type="button" class="btn btn-primary btn-block btn-lg">More Shopping</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>
<script src="./JS/script.js"></script>
</html>