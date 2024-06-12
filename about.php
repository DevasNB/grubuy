<?php
include 'getlogin.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grubuy - About</title>

    <link rel="shortcut icon" type="image/x-icon" href="imagens/grubuy5.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="color-background2">
    <?php
    include 'header.php';
    ?>
    <section id="about">
        <div class="container mt-4">
            <div class="bg-white style-border text-white m-md-4 m-sm-3">
                <div class="card-body p-md-3">
                    <div class="row justify-content-center">
                        <h1 class="mytext-h1 text-center m-2 p-2">About <span class="text-warning">Page</span></h1>
                        <div class="text-justify">
                            <h5 class="text-black ms-3 me-3">What is grubuy?</h5>
                            <p class="text-black ms-3 me-3">Grubuy is an online shopping platform project. It is currently being developed just to acquire knowledge of techniques and website development.</p>
                            <hr class="text-black m-3">
                            </hr>
                            <h5 class="text-black mt-3 ms-3 me-3">What functions are available in grubuy?</h5>
                            <p class="text-black ms-3 me-3">The available functions are register and use account, create products, edit products, delete products, buy products from other people.</p>
                            <hr class="text-black m-3">
                            </hr>
                            <h5 class="text-black mt-3 ms-3 me-3">Can i trust put my data in grubuy?</h5>
                            <p class="text-black ms-3 me-3">Yes! You can trust to put your email, name and password in grubuy. These are the only data we ask to create an account. Access to the database is restricted, passwords are encrypted and data is not shared or sold to third parties.
                                The only people with access to the database are the creator and other members of the <a href="https://drena.pt">drena.pt</a> project.</p>
                            <hr class="text-black m-3">
                            </hr>
                            <h5 class="text-black mt-3 ms-3 me-3">How/Who can I contact if I find bugs in grubuy?</h5>
                            <p class="text-black ms-3 me-3">You can contact the creator of the site at <a href="https://devas.pt/#contact-section">devas.pt</a>.
                                <br>On the site mentioned above, you can go down to the contact page and send an email to the creator. All feedback is welcome and a help for the creator.
                            </p>
                        </div>
                        <img class="p-5" src="imagens/about-thankyou.png">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>