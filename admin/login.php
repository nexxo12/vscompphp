<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Login - VSComp</title>

<?php include'../template/header.php';?>
<br>

<div class="container">
  <div class="row">
    <div class="login-form">
    <div class="col-md-6">
        <div class="login-form-input">
          <h4 class="text-center">LOGIN (ADMIN)</h4>
          <br><br>
          <form class="" action="" method="post">
          <label for="usr">Username :</label>
          <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off">
          <br>
          <label for="usr">Password :</label>
          <input type="text" class="form-control" name="password" placeholder="password" autocomplete="off">
          <br>
          <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
        <br><br>
    </div>
    </div>

  </div>


</div> <!-- end container -->

<br><br><br><br><br><br>


<?php include'../template/footer.php'; ?>
