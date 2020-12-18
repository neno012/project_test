<?php
include "db=connection.php";

$nama = $_POST['name'];
$jumlah = $_POST['jml'];
$harga= $_POST['harga'];
$query_stok = "SELECT * FROM stok where nama like '%$nama%'";
$rs_stok=mysqli_query($con,$query_stok);
$row_stok = mysqli_fetch_array($rs_stok);
$db_stok=$row_stok['nama'];
$db_jumlah=$row_stok['jumlah'];

if(isset ($_FILES["fileToUpload"]["name"])){
    $target_dir = "assets/gambar/";
    $target_dir2 = "assets/gambar/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_file2 = $target_dir2 . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 30000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$sql = "INSERT INTO pembelian VALUES ('','".$nama."','".$jumlah."','".$harga."','".$target_file2."')";
		if($db_stok==NULL){
		$sql2 = "INSERT INTO stok VALUES ('','".$nama."','".$jumlah."')";
		}else{
			$stok=$db_jumlah+$jumlah;
		$sql2="UPDATE stok SET jumlah='".$stok."',  WHERE nama like '%$nama%'";
		}
       
        if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
            echo "success";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($con);
        }
        $con->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}else{
	$sql = "INSERT INTO pembelian VALUES ('','".$nama."','".$jumlah."','".$harga."','')";
	if($db_stok==NULL){
	$sql2 = "INSERT INTO stok VALUES ('','".$nama."','".$jumlah."')";
	}else{
		$stok=$db_jumlah+$jumlah;
	$sql2="UPDATE stok SET jumlah='".$stok."' WHERE nama like '%$nama%'";
	}
   
	if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
		echo "success";
	} else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	}
	$con->close();
}
//con->close();
?>