<?php include("../class/login.php") ?>
<?php
if (isset($_POST['submit'])) {
    $user = new LoginUser($_POST['username'], $_POST['password']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/login.css">
</head>

<body>
    <header class='col-12 p-0 mb-5'>
        <div class="container">
            <?php
            require('layout/nav.php')
            ?>
        </div>
    </header>
    <main class='mb-5'>
        <div class="container mt-5 mb-5">
            <section class="Form justify-content-center">
                <div class="container">
                    <div class="row m-0">
                        <div class="col-lg">
                            <h1 class="font-weight-bold py-3 text-center">Laza</h1>
                            <h4 class='text-center'>Login to your account</h4>
                            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                                <script src="../../../assets/js/ignoreActionInForm.js"></script>
                                <div class="form-row">
                                    <div class="col-lg mx-auto">
                                        <input type="text" name="username" placeholder="Username" class="form-control my-3 p-2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg mx-auto">
                                        <input type="password" name="password" placeholder="Password" class="form-control my-3 p-2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg mx-auto">
                                        <button type="submit" name="submit" class="btn-login">Login</button>
                                    </div>
                                </div>
                                <p class='text-center'>If you haven't had an account? <a href="register/customerRegister.php">Register here!</a></p>
                                <p class="error text-center"><?php echo @$user->error ?></p>
                                <p class="succes text-center"><?php echo @$user->success ?></p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <div style="height: 145px"></div>
    <footer>
        <?php 
          require('layout/footer.php')
      ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>