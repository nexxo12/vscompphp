<?php
    include'../function/function.php';
    session_start();
    $user = $_SESSION['username'];
    $hasil = mysqli_query($conn, "SELECT *  FROM login WHERE USERNAME = '$user'");
    $row = mysqli_fetch_assoc($hasil);


    $id = $_GET["id"]; //variabel menerima 'id' yang dikirim dari 'master-barang.php'
    $deleteAkun = delete("DELETE FROM login WHERE ID_LOGIN = '$id'");

    if ($deleteAkun > 0) {
      if ($id == $row["ID_LOGIN"]) {
        header("location:../support/login.php");
        session_destroy();
      }
      else {
        echo "
            <script>
            alert('Data Berhasil Dihapus!!');
            document.location.href = 'list-akun.php';
            </script>
        ";
      }


    }


    else {
      echo "
          <script>
          alert('Data Gagal Dihapus!!');
          document.location.href = 'list-akun.php';
          </script>
      ";
    }

 ?>
