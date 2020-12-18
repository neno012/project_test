<?php
include "db=connection.php";

$id = $_POST['id'];
$query = "SELECT * FROM pembelian WHERE id=".$_POST['id'];
$rs = mysqli_query($con,$query);
$row = mysqli_fetch_array($rs);
$db_nama=$row['nama'];
$db_jumlah=$row['jumlah'];
///////////////////////////////////////////////////////
$query_stok = "SELECT * FROM stok WHERE nama like '%$db_nama%'";
$rs_stok = mysqli_query($con,$query_stok);
$row_stok= mysqli_fetch_array($rs_stok);
$db_stok=$row_stok['jumlah'];
$jumlahx=$db_stok - $db_jumlah;

/////
$sql = "DELETE FROM Pembelian WHERE id=".$id;
if ($con->query($sql) === TRUE) {
    echo "success";
    if($jumlahx=='0'){
        $sql2 = "DELETE FROM stok WHERE nama like '%$db_nama%'";
    }else{
        $sql2 = "UPDATE stok SET jumlah='".$jumlahx."' WHERE nama like '%$db_nama%'";
    }
    mysqli_query($con, $sql2);
} else {
    echo "error";
}

$con->close();


?>