
<?php
session_start();

if (isset($_POST["submit"])) {

    //data
    $product_name = $_POST["productname"];
    $product_description = $_POST["productdescription"];
    $product_price = $_POST["productprice"];
    $product_quantity = $_POST["productquantity"];
    $product_image = $_FILES['productimage'];


    //image upload
    // Destinaiton path
    // Concatenating uploaded file name with destination path
    $destination_path = "../uploads/products/" . $product_image['name'];

    if (is_uploaded_file($product_image['tmp_name'])) {
        if (!move_uploaded_file($product_image['tmp_name'], $destination_path)) {
            //header("location: ../myproducts.php?error=imagenotsent");
            //exit();
            $product_image['name'] = "productdefault.png";
        }
    } else {
        //header("location: ../myproducts.php?error=fail_to_upload_image");
        //exit();
        $product_image['name'] = "productdefault.png";
    }




    //Instances LoginControlers
    include "../loginscript/dbaccess.php";
    include "../newproductsscript/addnewproduct.function.php";
    include "../newproductsscript/addnewproduct.function.controlers.php";

    $user_creator = $_SESSION["user_ID"];

    //Other variables - like date and creator

    $newproducts = new NewProductsControlers($product_name, $product_description, $user_creator, $product_image['name'], $product_quantity, $product_price);

    //running errors and handlers
    $newproducts->newProductsUser();

    //Going to back to front page
    header("location: ../myproducts.php?error=new_product_registed");
}

?>