<?php
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH."mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
include "/mpdf/mpdf.php";
include "db=connection.php";
//Menggabungkan dengan file koneksi yang telah kita buat

 
 
$nama_dokumen='List-ccc';
$mpdf=new mPDF('utf-8', 'A4-L', 11, 'Georgia');
ob_start();
?>
<!DOCTYPE html>
<html>
<style>
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
</style>
<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
</head>
<body>
	<div>
		<h2 align="center">LIST STOK</h2>

<?php 
// $query ="SELECT * FROM stok";
// $rs=mysqli_query($con,$query);
// echo "
// <table class='table table-hover' align='center' width='80%'>
// <thead>
//   <tr>
//     <th>No</th>
//     <th>Nama Barang</th>
//     <th>Jumlah stok</th>
//     <th>harga/pc</th>
//     <th>Total Harga</th>
//     <th>gambar</th>
//   </tr>
// </thead>
// <tbody>";
// $no=1;
// while($row=mysqli_fetch_array($rs)){
//   $db_nama=$row['nama'];
//   $query_pembelian= "SELECT * FROM pembelian where nama like '%$db_nama%'";
//   $rs_pembelian=mysqli_query($con,$query_pembelian);
//   $row_pembelian = mysqli_fetch_array($rs_pembelian);
//   $total=$row['jumlah']*$row_pembelian['harga'];
//   echo"<tr>
//     <td>".$no."</td>
//     <td>".$row['nama']."</td>
//     <td>".$row['jumlah']."</td>
//     <td>".$row_pembelian['harga']."</td>
//     <td>".$total."</td>
//     <td>";
//         if($row_pembelian['gambar']==NULL){
//           echo"<img src='assets/gambar/imagenf.PNG' class='card-img-top' style='height: 50px; width:50px' alt=''>";
//         }else{
//           echo"<img src='".$row_pembelian['gambar']."' class='card-img-top' style='height: 50px; width:50px' alt=''>";
//         }
//         echo"
//     </td>
//   </tr>";
//   $no++;
// }
// echo"
// </tbody>
// </table>
// ";
		
?>
    </div>
 
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>