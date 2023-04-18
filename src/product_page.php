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
    <!-- My CSS  -->
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body style="background-color: #aaa;">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">C</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="/admin_page.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/product_page.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user_page.php">Users</a></li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Order Status
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Product Info</h1>
                <p class="lead fw-normal text-white-50 mb-0">Everything Manage Here</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="section__box" style="display: flex;flex-direction:column;justify-content:center;text-align: center;">
            <h1 class="m-3">Product Insertion</h1>
            <div style="display:flex;justify-content:center;flex-direction:column;" class="m-3">
                <label for="product_name" class="m-2">Product Name: 
                    <input type="text" name="product_name" id="product_name">
                </label>
                <label for="product_company" class="m-2">Company: 
                    <input type="text" name="product_company" id="product_company">
                </label>
                <label for="product_type" class="m-2">Type: 
                    <input type="text" name="product_type" id="product_type">
                </label>
                <label for="product_quantity" class="m-2">Quantity: 
                    <input type="text" name="product_quantity" id="product_quantity">
                </label>
                <label for="product_price" class="m-2">Price: 
                    <input type="text" name="product_price" id="product_price">
                </label>
                <label for="product_market_price" class="m-2">Market Price: 
                    <input type="text" name="product_market_price" id="product_market_price">
                </label>
                <label for="product_image" class="m-2">Image URL: 
                    <input type="text" name="product_image" id="product_image">
                </label>
            </div>
            <div>
                <button style="width: 200px;margin:auto;" class="btn bg-primary" onclick="add_product()">Submit</button>
                <button style="width: 200px;margin:auto;" class="btn bg-success" id="update_product" onclick="update_product()">Update</button>
            </div>
        </div>
        <div class="section_box" style="display: flex;flex-direction:column;justify-content:center;text-align: center;">
            <h1 class="m-3">Product Table</h1>
            <div style="display:flex;justify-content:center;" class="m-3">
                <table>
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Company</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Market Price</th>
                            <th>Image URL</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="alter_product_table_body"></tbody>
                </table>
            </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
</body>
<script src="./JS/script.js"></script>
</html>