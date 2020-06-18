<?php
include'../function/function.php';?>
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
          <h4 class="text-center">LOGIN (ADMIN / KASIR)</h4>
          <br><br>

          <?php
          if (isset($_POST["login"])) {
              $username = $_POST["username"];
              $password = md5($_POST["password"]);
              $hasil = mysqli_query($conn, "SELECT * FROM login WHERE USERNAME = '$username' AND PASSWORD = '$password'");
              $row = mysqli_fetch_assoc($hasil);
              // cek USERNAME n password
              if ($row["LEVEL"] == "super") {
                session_start();
                $_SESSION["LEVEL"] = $row["LEVEL"];
                $_SESSION['username'] = $username;
                header("location: ../admin/dasboard.php");
                exit;
              }
              elseif ($row["LEVEL"] == "kasir") {
                session_start();
                $_SESSION['username'] = $username;
                header("location: ../kasir/dasboard.php");
                exit;
              }

              else {
                echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <strong>Gagal!</strong> Username dan Password salah!!
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                    </button></div>";
              }


          }

           ?>

          <form class="" action="" method="post">
          <label for="usr">Username :</label>
          <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off" required>
          <br>
          <label for="usr">Password :</label>
          <input type="password" class="form-control" name="password" placeholder="password" autocomplete="off" required>
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
