<?php
include "db=connection.php";
//session_start();
$query= "SELECT * FROM stok";
$rs=mysqli_query($con,$query);
echo "<div class='content-wrapper'>
        <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h3 class='card-title'>Pembelian Barang</h3>

              <div class='card-tools'>
                <div class='input-group input-group-sm' style='width: 150px;'>
                  <input type='text' name='table_search' class='form-control float-right' placeholder='Search'>

                  <div class='input-group-append'>
                    <button type='button' class='btn btn-default'><i class='fas fa-search'></i></button>
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
                    <th>Jumlah stok</th>
                    <th>harga/pc</th>
                    <th>Total Harga</th>
                    <th>gambar</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>";
                $no=1;
                while($row=mysqli_fetch_array($rs)){
                  $db_nama=$row['nama'];
                  $query_pembelian= "SELECT * FROM pembelian where nama like '%$db_nama%'";
                  $rs_pembelian=mysqli_query($con,$query_pembelian);
                  $row_pembelian = mysqli_fetch_array($rs_pembelian);
                  $total=$row['jumlah']*$row_pembelian['harga'];
                  echo"<tr>
                    <td>".$no."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['jumlah']."</td>
                    <td>".$row_pembelian['harga']."</td>
                    <td>".$total."</td>
                    <td>";
                        if($row_pembelian['gambar']==NULL){
                          echo"<img src='assets/gambar/imagenf.PNG' class='card-img-top' style='height: 50px; width:50px' alt=''>";
                        }else{
                          echo"<img src='".$row_pembelian['gambar']."' class='card-img-top' style='height: 50px; width:50px' alt=''>";
                        }
                        echo"
                    </td>
                    <td>
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
</script>

