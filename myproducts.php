<?php
include 'getlogin.php';
include './loginscript/dbaccess.php';

#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

session_start();

if (isset($_SESSION["user_Name"])) {
    echo '';
} else {
    header("location: login.php?error=startyoursession");
}

//select from database products of the users connect
class picmyproducts extends Database
{
    public function pickProducts()
    {
        $user_creator = $_SESSION["user_ID"];

        $stmt = $this->connect()->prepare('SELECT * FROM products WHERE productCreator = ?;');
        $stmt->execute(array($user_creator));

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grubuy - My Product</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagens/grubuy5.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="color-background">
    <?php
    include 'header.php';
    ?>

    <section id="myproducts">
        <div class="container mt-4 text-center">
            <div class="bg-white style-border4">
                <h1 class="mytext-h1 text-center m-2 p-2">My <span class="text-warning">Products</span></h1>
            </div>
            <div class="row">
                <div class="col-md-3 mt-3">
                    <a href="addnewproduct.php">
                        <div class="card style-border4">
                            <img src="imagens/image icons/addproduct_icon.png" class="card-img-top card-image-size3">
                            <!--<div class="card-body">
                                <h5 class="card-title text-uppercase">Add New Product</h5>
                                <p class="card-text"></p>
                            </div>-->
                        </div>
                    </a>
                </div>
                <?php

                $myproduct = new picmyproducts();
                $numberproducts = $myproduct->pickProducts();


                for ($i = 0; $i < count($numberproducts); $i++) {

                    $productsID = $numberproducts[$i]['productID'];
                    $_SESSION['varID'] = $productsID;

                    $description = $numberproducts[$i]['productDescription'];
                    $description = substr($description, 0, 100) . '...';

                    echo '<div class="col-md-3 mt-3">
                            <div class="card style-border4">
                            <img src="uploads/products/' . $numberproducts[$i]['productImage'] . '" class="card-img-top card-image-size" alt="...">
                              <div class="card-body">
                                <h5 class="card-title text-primary title-1line">' . $numberproducts[$i]['productName'] . '</h5>
                                <h4 class="badge bg-warning">' . $numberproducts[$i]['productPrice'] . ' €</h4>
                                <div class="d-flex row align-items-center">
                                    <div class="col-12 mb-2">
                                    <form action="./productpage.php" method="post">
                                        <input name="productID" type="hidden" value="' . $productsID . '" readonly/>
                                        <button type="submit" name="action" class="btn btn-warning btn-size"><i class="bi bi-basket"></i> Product Page</button>
                                    </form>
                                    </div>
                                    <div class="col-6">
                                        <form action="./editproduct.php" method="post">
                                        <input name="productID" type="hidden" value="' . $productsID . '" readonly/>
                                        <button type="submit" name="action" class="btn btn-primary btn-size"><i class="bi bi-pencil"></i> Edit</a>
                                        </form>
                                    </div>
                                    
                                    <div class="col-6">
                                        <form action="./edit_delete_productscript/deleteproduct.php" method="post">
                                        <input name="productID" type="hidden" value="' . $productsID . '" readonly/>
                                        <button type="submit" name="submit" class="btn btn-danger btn-size"><i class="bi bi-trash-fill"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        ';
                }
                ?>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>