<?php
include "db=connection.php";
$query = "SELECT * FROM pembelian WHERE id=".$_POST['id'];
$rs = mysqli_query($con,$query);
$row = mysqli_fetch_array($rs);
//var_dump($_POST['id']);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Update Barang</h3>
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
                <label for='nama'>Nama Barang</label>
                <input type='text' name='id' id='id' value='".$_POST['id']."' hidden>
                <input type='text' class='form-control' id='nama' name='nama' value='".$row['nama']."'>
                </div>
                <div class='form-group'>
                <label for='jml'>Jumlah Barang</label>
                <input type='text' class='form-control' id='jml' name='jml' value='".$row['jumlah']."'>
                </div>
                <div class='form-group'>
                <label for='jml'>Harga Barang/pc</label>
                <input type='text' class='form-control' id='harga' name='harga' value='".$row['harga']."'>
                </div>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
            <button type='button' class='btn btn-primary' onclick='updatepembelian()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";


?>
<script>
  function updatepembelian(){
    var a = $("input[name=nama]").val();
    var b = $("input[name=jml]").val();
    var c = $("input[name=harga]").val();
    var d = $("input[name=id]").val();

    $.ajax({
        url:"UpdatePembelian.php",
        method: "POST",
        asynch: false,
        data:{nama:a,jml:b,harga:c,id:d},
        success:function(data){
          reloadPage(1,0,0);
        }
      });
  }  
</script>