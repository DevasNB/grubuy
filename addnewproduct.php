<?php
include 'getlogin.php';
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

    <title>Grubuy - Creating Product</title>

    <link rel="shortcut icon" type="image/x-icon" href="/imagens/grubuy5.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="color-background">
    <?php
    require "header.php"
    ?>

    <div class="container px-4 mt-4">
        <form action="newproductsscript/new_addnewproduct.php" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card style-border4 mb-4 mb-xl-0">
                        <div class="card-header">Product Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="card-img-top card-image-size3" src="/imagens/image icons/product_icon.png" alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button -->
                            <input class="btn btn-primary file-btn" type="file" name="productimage" accept="image/*">
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
                                <input class="form-control" name="productname" type="text">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1 bold">Product Details: </label>
                                <input class="form-control" name="productdescription" type="text">
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Product Price: </label>
                                    <input class="form-control" name="productprice" step="0.01" type="number">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Product Quantity: </label>
                                    <input class="form-control" name="productquantity" type="number">
                                </div>
                            </div>
                            <button class="btn btn-warning" type="submit" name="submit">Send Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>