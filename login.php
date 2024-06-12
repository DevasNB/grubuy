<!doctype html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Grubuy - Login</title>

  <link rel="shortcut icon" type="image/x-icon" href="/imagens/grubuy5.png" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <!--<div class="transition">
    <div class="cover cover1"></div>
  </div>-->
  <section class="color-background center-screen">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center align-items-center col-sm-m-5">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">

          <img src="imagens/grubuy4.png" class="img-fluid" alt="Grubuy Logo">

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 offset-xl-1">
          <form action="loginscript/getlogin.php" method="POST">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="mytext mb-3 me-3">Sign in</p>
              <!-- Buttões de iniciar sessão formas alternativas
              <a type="button" class="btn btn-primary btn-floating mb-3 ml-2">
                <img src="/imagens/google icon.png" width="20px">
              </a>
              <a type="button" class="btn btn-primary btn-floating mb-3 ml-2">
                <img src="/imagens/icons/facebook.svg">
              </a>
              <a type="button" class="btn btn-primary btn-floating mb-3 ml-2">
                <img src="/imagens/icons/twitter.svg" class="image-icon-button">
              </a>-->
            </div>


            <!-- Email input -->
            <div class="d-flex flex-row align-items-center mb-3">
              <div class="form-outline flex-fill mb-0 style-border4">
                <input type="email" name="email" class="form-control form-control-lg form-login-size style-border4" placeholder="Email" />
              </div>
            </div>

            <!-- Password input -->
            <div class="d-flex flex-row align-items-center mb-3">
              <div class="form-outline flex-fill mb-0 style-border4">
                <input type="password" name="password" class="form-control form-control-lg form-login-size style-border4" placeholder="Password" />
              </div>
            </div>

            <div class="text-center text-lg-start mt-3">
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
              <p class="mytext2 small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php" class="mytext2 animate link-danger">Register</a></p>
            </div>

          </form>
        </div>
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
              echo '<p class="text-danger text-center bold">* Fill in all fields! *</p>';
            } 
            else if ($_GET["error"] == "emailNotExist") {
              echo '<p class="text-danger text-center bold>* Email not exist! *</p>';
            } 
            else if ($_GET["error"] == "passwordNotMatch") {
              echo '<p class="text-danger text-center bold>* Password incorrect! *</p>';
            }
          }
          ?>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>