<!doctype html>

<head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Grubuy - Register</title>

      <link rel="shortcut icon" type="image/x-icon" href="/imagens/grubuy5.png" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/style.css">
</head>

<body>
      <section class="color-background2 center-screen">
            <div class="container-fluid">
                  <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-12 col-xl-11">
                              <div class="card style-border text-black">
                                    <div class="card-body p-md-5">
                                          <div class="row justify-content-center">
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 order-2 order-lg-1">

                                                      <p class="text-center mytext-h1 fw-bold mb-3 mx-1 mx-md-4 mt-3">Sign up</p>
                                                      <form action="./loginscript/getregister.php" class="mx-1 mx-md-4" method="POST">

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                  <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                                                  <div class="form-outline flex-fill mb-0 style-border4">
                                                                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Your Name" />

                                                                  </div>
                                                            </div>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                  <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                                                  <div class="form-outline flex-fill mb-0 style-border4">
                                                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Your Email" />

                                                                  </div>
                                                            </div>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                  <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                                                  <div class="form-outline flex-fill mb-0 style-border4">
                                                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />

                                                                  </div>
                                                            </div>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                  <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                                                                  <div class="form-outline flex-fill mb-0 style-border4">
                                                                        <input type="password" name="Rpassword" class="form-control form-control-lg" placeholder="Repeat Password" />

                                                                  </div>
                                                            </div>

                                                            <!--<div class="form-check d-flex mb-4">
                      <input class="form-check-input ms-2" type="checkbox" value="" id="TermOfService" />

                      <label class="mytext2 form-check-label warning-primary" for="form2Example3">
                        I agree all statements in <a href="#!" class="text-warning">Terms of service</a>
                      </label>
                    </div>-->
                                                            <div class="d-flex justify-content-center mx-3 mb-3 mb-lg-3">
                                                                  <button type="submit" name="submit" class="btn btn-warning btn-lg">Register</button>
                                                            </div>

                                                      </form>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-6 col-xl-7 d-flex justify-content-center align-items-center order-1 order-lg-2">

                                                      <img src="imagens/grubuy5.png" class="img-fluid" alt="Sample image">

                                                </div>
                                          </div>
                                          <?php
                                          if (isset($_GET['id'])) {
                                                if ($_GET["error"] == "emptyinput") {
                                                      echo '<p class="text-danger text-center bold">* Fill in all fields! *</p>';
                                                } else if ($_GET["error"] == "invalidname") {
                                                      echo '<p class="text-danger text-center bold">* The name cannot contain numbers! *</p>';
                                                } else if ($_GET["error"] == "invalidemail") {
                                                      echo '<p class="text-danger text-center bold">* Enter a valid email address! *</p>';
                                                } else if ($_GET["error"] == "passwordsdontmatch") {
                                                      echo '<p class="text-danger text-center bold">* Passwords doesnt match! *</p>';
                                                } else if ($_GET["error"] == "stmtfailed") {
                                                      echo '<p class="text-danger text-center bold">* Something went wrong, try again! *</p>';
                                                } else if ($_GET["error"] == "emailtaken") {
                                                      echo '<p class="text-danger text-center bold">* This mail is already registed! *</p>';
                                                }
                                          }
                                          ?>
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