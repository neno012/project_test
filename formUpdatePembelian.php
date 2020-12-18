<?php
include "db=connection.php";
session_start();
$query = "SELECT * FROM siswa WHERE id=".$_POST['id'];
$rs = mysqli_query($con,$query);
$row = mysqli_fetch_array($rs);


echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Update Siswa</h3>
            <div class='card-tools'>
            <div class='input-group input-group-sm' style='width: 150px;'>
              <div class='input-group-append'>
                <button type='button' class='btn btn-primary' onclick='reloadPage(1,0,0)'><i class='fas fa-chevron-circle-left'></i></button>
              </div>
            </div>
          </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role='form'>
            <div class='card-body'>
                <div class='form-group'>
                <label for='alamat'>Alamat</label>
                <input type='text' name='id' id='id' value='".$_POST['id']."' hidden>
                <textarea class='form-control' id='alamat' name='alamat' rows='3'  value='".$row['alamat']."' placeholder='Masukkan Alamat ...'>".$row['alamat']."</textarea>
                </div>
                <div class='form-group'>
                <label for='no_hp'>Nomor Handphone</label>
                <input type='text' class='form-control' id='no_hp' name='no_hp'  value='".$row['nohp']."' placeholder='Masukkan nomor Handphone siswa'>
                </div>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='UpdateSiswa()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function UpdateSiswa(){
    var a = $("input[name=id]").val();
    var b = $('#alamat').val();
    var c = $("input[name=no_hp]").val();
//alert(b);

    $.ajax({
        url:"UpdateSiswa.php",
        method: "POST",
        asynch: false,
        data:{id:a,alamat:b,no_hp:c},
        success:function(data){
          reloadPage(1,0,0);
        }
      });
    
  }
</script>