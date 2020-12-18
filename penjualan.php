<?php
include "db=connection.php";
//session_start();
$content_kec=file_get_contents("https://kodepos-2d475.firebaseio.com/kota_kab/k69.json?print=pretty");
$content_kec=utf8_encode($content_kec);
$result_kec=json_decode($content_kec,true);
$query= "SELECT * FROM penjualan";
$rs=mysqli_query($con,$query);
echo "<div class='content-wrapper'>
        <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h3 class='card-title'>Penjualan Barang</h3>

              <div class='card-tools'>
                <div class='input-group input-group-sm' style='width: 150px;'>
                  <input type='text' name='table_search' class='form-control float-right' placeholder='Search'>

                  <div class='input-group-append'>
                    <button type='button' class='btn btn-default'><i class='fas fa-search'></i></button>
                    <button type='button' class='btn btn-default' onclick='movePage(3,0,0)'>Add</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class='card-body table-responsive p-0'>
              <table class='table table-hover'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pembelian</th>
                    <th>Total Bayar</th>
                    <th>Alamat Pengiriman</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>";
                $no=1;
                while($row=mysqli_fetch_array($rs)){
                    $nama=$row['nama'];
                    $query_pembelian = "SELECT * FROM pembelian where nama like '%$nama%'";
                    $rs_pembelian=mysqli_query($con,$query_pembelian);
                    $row_pembelian = mysqli_fetch_array($rs_pembelian);
                    $kecamatan=$row['kecamatan'];
                    $harga=$row['jumlah']* $row_pembelian['harga'];
                  echo"<tr>
                    <td>".$no."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['jumlah']."</td>
                    <td>".$harga."</td>";
                    foreach ($result_kec as $key => $value){
                        if($kecamatan==$key){
                      echo"
                      <td>".$value['kelurahan'].",".$value['kecamatan'].",".$row['kota'].",".$row['provinsi']."/".$value['kodepos']."
                      </td>";
                        }
                    }
                    echo"
                    <td>
                    </td>
                  </tr>";
                  $no++;
                }
                echo"
                </tbody>
              </table>
            </div>


            <!-- Modal -->
            <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Detail</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <div class='fetched-data'></div>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!--- End Modal ----!>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
</div>";
?>
<script>
  function delsiswa(x){
    var txt;
    var r = confirm("Are you sure to delete?");
    if (r == true) {
     $.ajax({
        url:"delPembelian.php",
        method: "POST",
        asynch: false,
        data:{id:x},
        success:function(data){
          if(data=="success"){
            reloadPage(1,0,0);
          }else{
            alert("Fail to Delete");
          }
        }
      });
    } 
  }


</script>

