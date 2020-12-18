<?php
include "db=connection.php";
session_start();
$query= "SELECT * FROM absen";
$rs=mysqli_query($con,$query);
echo "<div class='content-wrapper'>
        <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h3 class='card-title'>Data Absensi Siswa</h3>

              <div class='card-tools'>
                <div class='input-group input-group-sm' style='width: 150px;'>
                  <input type='text' name='table_search' class='form-control float-right' placeholder='Search'>

                  <div class='input-group-append'>
                    <button type='submit' class='btn btn-default'><i class='fas fa-search'></i></button>
                    <button type='button' class='btn btn-default' onclick='reloadPage(9,0,0)'>Absen</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class='card-body table-responsive p-0'>
              <table class='table table-hover'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tgl</th>
                    <th>Nama Siswa</th>
                    <th>Nama Guru</th>
                    <th>Mapel</th>
                    <th>Nilai</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>";
                $no=1;
                while($row=mysqli_fetch_array($rs)){
                  $query_siswa= "SELECT * FROM siswa where id=".$row['siswa'];
                  $rs_siswa=mysqli_query($con,$query_siswa);
                  $row_siswa=mysqli_fetch_array($rs_siswa);

                  $query_guru= "SELECT * FROM guru where id=".$row['guru'];
                  $rs_guru=mysqli_query($con,$query_guru);
                  $row_guru=mysqli_fetch_array($rs_guru);

                  $query_mapel= "SELECT * FROM mapel where id=".$row['mapel'];
                  $rs_mapel=mysqli_query($con,$query_mapel);
                  $row_mapel=mysqli_fetch_array($rs_mapel);
                  echo"<tr>
                    <td>".$no."</td>
                    <td>".$row['tgl']."</td>
                    <td>".$row_siswa['nama']."</td>
                    <td>".$row_guru['nama']."</td>
                    <td>".$row_mapel['nama']."</td>
                    <td>".$row['nilai']."</td>
                    <td>
                    <button type='submit' onclick='editPage(4,".$row['id'].",0,0)' style='font-size:13px;' class='btn btn-warning'><i class='fa fa-edit' aria-hidden='true''></i></button>
                    <button type='submit' onclick='delabsen(".$row['id'].")' style='font-size:13px;' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                    </td>
                  </tr>";
                  $no++;
                }
                echo"
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
</div>";
?>
<script>
  function delabsen(x){
    var txt;
    var r = confirm("Are you sure to delete?");
    if (r == true) {
     $.ajax({
        url:"delabsen.php",
        method: "POST",
        asynch: false,
        data:{id:x},
        success:function(data){
          if(data=="success"){
            reloadPage(4,0,0);
          }else{
            alert("Fail to Delete");
          }
        }
      });
    } 
  }
</script>


