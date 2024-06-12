<?php
include 'getlogin.php';
include './loginscript/dbaccess.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["user_Name"])) {
    echo '';
} else {
    header("location: login.php?error=startyoursession");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Grubuy - Cart</title>

        <link rel="shortcut icon" type="image/x-icon" href="/imagens/grubuy5.png" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
</head>

<body class="color-background2">
    <?php
    include 'header.php';
    ?>
    <section class="h-100 h-custom">
        <div class="container mt-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="bg-white style-border4">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-12">
                                    <h5 class="mb-3"><a href="products.php" class="text-warning"><i class="bi bi-arrow-left"></i> Continue shopping</a></h5>
                                    <hr>


                                    <?php

                                    class picmycart extends Database
                                    {
                                        public function pickCartProducts()
                                        {
                                            $user_ID = $_SESSION["user_ID"];

                                            $stmt = $this->connect()->prepare('SELECT * FROM cart WHERE usrID = ?;');
                                            $stmt->execute(array($user_ID));

                                            $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            $productIDs = array();
                                            foreach ($cart as $row) {
                                                $productIDs[] = $row["prodID"];
                                            }

                                            $cart2 = array();
                                            foreach ($productIDs as $id) {
                                                $stmt2 = $this->connect()->prepare('SELECT * FROM products WHERE productID = ?;');
                                                $stmt2->execute(array($id));
                                                $product = $stmt2->fetch(PDO::FETCH_ASSOC);

                                                $stmt3 = $this->connect()->prepare('SELECT prodQuantity FROM cart WHERE usrID = ? AND prodID = ?;');
                                                $stmt3->execute(array($user_ID, $id));
                                                $quantity = $stmt3->fetchColumn();

                                                $product['quantity'] = $quantity;
                                                $cart2[] = $product;
                                            }

                                            return $cart2;
                                        }
                                    }

                                    $mycart2 = new picmycart();
                                    $numberproducts = $mycart2->pickCartProducts();

                                    $sub_price = 0;
                                    $service_price = 0;
                                    $final_price = 0;

                                    if (empty($numberproducts)) {
                                        echo '
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Shopping cart</p>
                                                <p class="mb-0">You have 0 items in your cart</p>
                                            </div>
                                        </div>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center text-center">
                                                        <h1 class="mytext-h1">NO PRODCUTS HERE</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                    } else {

                                        echo '
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Shopping cart</p>
                                                <p class="mb-0">You have ' . count($numberproducts) . ' items in your cart</p>
                                            </div>
                                        </div>
                                        ';

                                        for ($i = 0; $i < count($numberproducts); $i++) {

                                            $prodID = $numberproducts[$i]['productID'];

                                            echo '
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="uploads/products/' . $numberproducts[$i]["productImage"] . '" class="card-img-top card-image-size3 style-border5" alt="Shopping item" style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5>' . $numberproducts[$i]["productName"] . '</h5>
                                                                <p class="small mb-0">' . $numberproducts[$i]["productDescription"] . '</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0">' . $numberproducts[$i]["quantity"] . '</h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0">' . $numberproducts[$i]["productPrice"] . '</h5>
                                                            </div>
                                                            <form action="cartscript/deletecart.php" method="POST">
                                                                <input name="prodID" type="hidden" value="' . $prodID . '" readonly/>
                                                                <button class="btn btn-danger" name="submit" type="submit"><i class="bi bi-trash-fill"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ';
                                            
                                            $sub_price += ($numberproducts[$i]["quantity"] * $numberproducts[$i]["productPrice"]);
                                            $service_price += 1;
                                            $final_price += ($numberproducts[$i]["quantity"] * $numberproducts[$i]["productPrice"]) + 1;

                                        }
                                    }
                                        echo '
                                            <hr class="my-4">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2">' . number_format($sub_price, 2) . ' €</p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Service</p>
                                                <p class="mb-2">'.number_format($service_price, 2).' €</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total(Incl. taxes)</p>
                                                <p class="mb-2">' . number_format($final_price, 2) . ' €</p>
                                            </div>
                                            <form action="./cartscript/productsell.php" method="POST" id="product-form">

                                           
                                                <input type="hidden" name="usrID" value="' . $_SESSION["user_ID"] . '" readonly/>

                                                <button type="submit" name="submit" class="btn btn-lg btn-warning">
                                                    <div class="d-flex justify-content-between">
                                                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                    </div>
                                                </button>
                                            </form>';
                                    ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>