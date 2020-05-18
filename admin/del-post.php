<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id'


    //menghapus gambar direktori web
    $img = "SELECT GAMBAR FROM news WHERE ID_NEWS = '$id'";
    $hasil = mysqli_query ($conn,$img);
    $data = mysqli_fetch_assoc($hasil);

    if (file_exists("../img/news/$data[GAMBAR]")) {
        unlink("../img/news/$data[GAMBAR]");
        //var_dump($data);
        $del_post = delete("DELETE FROM news WHERE ID_NEWS= '$id'");
        echo "
            <script>
            alert('Data Berhasil Dihapus!!');
            document.location.href = '../admin/news.php';
            </script>
        ";

    }



 ?>
