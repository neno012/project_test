<?php
include "db=connection.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$jumlah = $_POST['jml'];
$harga = $_POST['harga'];



$sql = "UPDATE pembelian SET nama='".$nama."', jumlah='".$jumlah."', harga='".$harga."' WHERE id=".$id;
if (mysqli_query($con, $sql)) {
    echo "success";

} else {
    echo "Error: " . $sql . "" . mysqli_error($con);
}

$con->close();


?>