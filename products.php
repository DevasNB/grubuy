<?php
include './loginscript/dbaccess.php';

session_start();

//select from database products of the users connect
class picproducts extends Database
{
    public function pickProducts()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM products;');
        $stmt->execute(array());

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}

$product = new picproducts();
$numberproducts = $product->pickProducts();

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grubuy - Products</title>

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
                <h1 class="mytext-h1 text-center m-2 p-2">Product <span class="text-warning">Store</span></h1>
            </div>
            
            <div class="row">
                <?php     
                
                for ($i = 0; $i < count($numberproducts); $i++) {

                $productsID = $numberproducts[$i]['productID'];

                $description = $numberproducts[$i]['productDescription'];
                $description = substr($description, 0, 100) . '...';

                echo '
                    <div class="col-md-3 mt-3">
                        <div class="card style-border4">
                            <img src="uploads/products/' . $numberproducts[$i]['productImage'] . '" class="card-img-top card-image-size" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-primary title-1line">' . $numberproducts[$i]['productName'] . '</h5>
                                <span class="badge bg-warning">' . $numberproducts[$i]['productPrice'] . ' €</span>
                                <p class="card-text description-3line">' . $numberproducts[$i]['productDescription'] . '</p>
                                <div class="d-flex row align-items-center">
                                    <form action="./productpage.php" method="post">
                                        <div class="d-flex align-items-start col-12 mb-2">
                                            <input name="productID" type="hidden" value="' . $productsID . '" readonly/>
                                            <button type="submit" name="action" class="btn btn-warning btn-size"><i class="bi bi-basket"></i> Product Page</button>
                                        </div>
                                    </form>
                                    
                                    <!--<div class="d-flex align-items-start col-12">
                                        <button type="submit" name="action" value="addtocart" class="btn btn-primary crazy btn-size"><i class="bi bi-basket"></i> Add to Cart</button>
                                    </div>-->
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Posted on ' . time_elapsed_string($numberproducts[$i]['productDate']) . '</small>
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