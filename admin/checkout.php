<?php include'../function/function.php'  ?>

<?php
if(isset($_POST["id_pj"])){
$inv = $_POST["id_pj"];
$total_harga = $_POST["total"];
$nama_barang = $_POST["nama_barang"];
$tgl = $_POST["tgl"];
$query = "INSERT INTO inv_penjualan VALUES ('$inv','$tgl','$nama_barang','$total_harga') ";
$del_list = deletepembelian("TRUNCATE TABLE list_penjualan");
$hasil = mysqli_query ($conn,$query);
        if ($hasil > 0) {

          echo "Berhasil";

        }
        elseif ($del_list > 0) {
          echo "
              <script>
              document.location.href = '../admin/penjualan.php';
              </script>
          ";

        }
        else {
          echo mysqli_error($conn);
        }
}

?>
