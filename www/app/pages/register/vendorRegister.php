<?php include("../../class/vendor.php") ?>
<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $raw_password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT);
  $profilePicture =  $_FILES['profilePicture'];
  $businessName = $_POST['businessName'];
  $businessAddress = $_POST['businessAddress'];

  $user = new Vendor($username, $password, $raw_password, $profilePicture, $businessName, $businessAddress);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/register.css">
  <title>Register for Vendor</title>
</head>

<body>
  <div class='container mt-4'>
    <?php
    require('../layout/nav.php')
    ?>
    <div class='row justify-content-center'>
      <div class='mb-4'>
        <h2 class="col-12 text-center ">REGISTER</h2>
      </div>
      <div class="col-10">
        <ul class='d-flex justify-content-around list-unstyled text-center'>
          <li class=' col-lg-2 col-md m-2 p-2 bg-secondary border border-secondary'><a href='vendorRegister.php' class=' text-decoration-none text-white' id='userRole'>Vendor</a></li>
          <li class='  col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><a href='customerRegister.php' class='text-decoration-none text-secondary'>Customer</a></li>
          <li class=' col-lg-2 col-md m-2 p-2 bg-light border border-secondary'><a href='shipperRegister.php' class='text-decoration-none text-secondary'>Shipper</a></li>
        </ul>
        <div id='error'></div>
        <form action="#" class="col-sm-10 col-lg-8 form mx-auto" id="form" enctype="multipart/form-data" name='registerForm' method='post'>
          <script src="../../../assets/js/ignoreActionInForm.js"></script>
          <p class="error"><?php echo @$user->error ?></p>
          <p class="success"><?php echo @$user->success ?></p>
          <div class="mb-4">
            <label for="username" class="form-label pb-3 ">Username</label>
            <input name="username" type="text" class="form-control w-100" id="username" placeholder='Username' required>
            <small id="usernameError"></small>
          </div>
          <div class="mb-4">
            <label for="password" class="form-label pb-3">Password</label>
            <input name="password" type="password" class="form-control w-100" id="password" placeholder='Password' required>
            <small id="passwordError"></small>
          </div>
          <div class="mb-4">
            <label for="profilePicture" class="form-label pb-2">Profile Picture</label>
            <input name="profilePicture" type="file" class="form-control w-100" id="profilePicture">
          </div>
          <div class="mb-4">
            <label for="businessName" class="form-label pb-3 ">Business Name</label>
            <input name="businessName" type="text" class="form-control w-100" id="businessName" placeholder='Business Name' required>
            <small id="businessNameError"></small>
          </div>
          <div class="mb-4">
            <label for="businessAddress" class="form-label pb-3 ">Business Address</label>
            <input name="businessAddress" type="text" class="form-control w-100" id="businessAddress" placeholder='Business Address' required>
            <small id="businessAddressError"></small>
          </div>
          <div class="mb-4 row justify-content-center">
            <input name='submit' value="Register" type="submit" class=" col-lg-8 btn btn-outline-dark " id="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("userRole").value = 'vendor';
  </script>
  <script src="../../../assets/js/register.js"></script>
  <footer class='mt-5'>
    <?php
    require('../layout/footer.php')
    ?>
  </footer>
</body>

</html>