<?php
include "db=connection.php";

$nama = $_POST['nama'];
$jumlah = $_POST['jml'];
$kota= $_POST['kota'];
$kecamatan = $_POST['kecamatan'];
$provinsi= $_POST['provinsi'];


$sql = "INSERT INTO penjualan VALUES ('','".$nama."','".$jumlah."','".$provinsi."','".$kota."','".$kecamatan."')";
	if (mysqli_query($con, $sql)) {
        echo "success";
		$querystok = "SELECT * FROM stok where nama like '%$nama%'";
		$rsstok=mysqli_query($con,$querystok);
		$rowstok = mysqli_fetch_array($rsstok);
		$stok = $rowstok['jumlah'];

		$selisih = $stok - $jumlah;
		$sql2 = "UPDATE stok SET jumlah = '".$selisih."' WHERE nama like '%$nama%'";
		$rs = mysqli_query($con, $sql2);
		//var_dump("Jumlah stok Berhasil di Update");

	} else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	}
	$con->close();
?>