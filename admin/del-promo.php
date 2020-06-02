<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id'


    //menghapus gambar direktori web
    $img = "SELECT GAMBAR FROM promo WHERE ID_PROMO = '$id'";
    $hasil = mysqli_query ($conn,$img);
    $data = mysqli_fetch_assoc($hasil);

    if (file_exists("../img/promo/$data[GAMBAR]")) {
        unlink("../img/promo/$data[GAMBAR]");
        //var_dump($data);
        $del_post = delete("DELETE FROM promo WHERE ID_PROMO= '$id'");
        echo "
            <script>
            alert('Data Berhasil Dihapus!!');
            document.location.href = '../admin/promo.php';
            </script>
        ";

    }



 ?>
