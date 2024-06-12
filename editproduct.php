<?php
include 'getlogin.php';
include './loginscript/dbaccess.php';

session_start();

if (isset($_SESSION["user_Name"])) {
    echo '';
} else {
    header("location: ../login.php?error=startyoursession");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grubuy - Editing Product</title>

    <link rel="shortcut icon" type="image/x-icon" href="/imagens/grubuy5.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="color-background">
    <?php
    require "header.php"
    ?>

    <div class="container px-4 mt-4">
        <form action="./edit_delete_productscript/changeproduct.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <?php

                class editmyproduct extends Database
                {
                    public function pickProduct($productID)
                    {
                        $stmt = $this->connect()->prepare('SELECT * FROM products WHERE productID = ?;');
                        $stmt->execute(array($productID));

                        $eproducts = $stmt->fetch(PDO::FETCH_ASSOC);

                        return $eproducts;
                    }
                }

                $myproduct = new editmyproduct();

                $productID = isset($_POST['productID']) ? $_POST['productID'] : '';
                $product_edit = $myproduct->pickProduct($productID);

                echo '
                <input name="productID" type="hidden" value="' . $product_edit['productID'] . '" readonly/>
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card style-border4 mb-4 mb-xl-0">
                        <div class="card-header">Product Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="style-border5 card-img-top card-image-size" src="/uploads/products/' . $product_edit['productImage'] . '" alt="product image">
                            <!-- Profile picture upload button -->
                            <input class="btn btn-primary file-btn mt-3" type="file" name="productimage" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4 style-border4">
                        <div class="card-header">Product Details</div>
                        <div class="card-body">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1 bold">Product Name: </label>
                                <input class="form-control" name="productname" value="' . $product_edit['productName'] . '" type="text">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1 bold">Product Details: </label>
                                <input class="form-control" name="productdescription" value="' . $product_edit['productDescription'] . '" type="text">
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Product Price: </label>
                                    <input class="form-control" name="productprice" value="' . $product_edit['productPrice'] . '" type="number">
                                                </div>
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1">Product Quantity: </label>
                                                    <input class="form-control" name="productquantity" value="' . $product_edit['productQuantity'] . '" type="number">
                                                </div>
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-warning">Save Changes</button>
                                            <a href="myproducts.php" class="btn btn-danger ms-2">Back to My Products</a>

                                            <p class="text-danger text-center m-2"> * log out of the account and log back in to see updated data *</p>
                                        </div>
                                    </div>
                                </div>
                                ';
                ?>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>