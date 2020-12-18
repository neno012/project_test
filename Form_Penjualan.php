<?php
include "db=connection.php";
//var_dump($query);
$content=file_get_contents("https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty");
//mengubah standar encoding
$content=utf8_encode($content);
//mengubah data json menjadi data array asosiatif
$result=json_decode($content,true);

$content_kota=file_get_contents("https://kodepos-2d475.firebaseio.com/list_kotakab/p9.json?print=pretty");
$content_kota=utf8_encode($content_kota);
$result_kota=json_decode($content_kota,true);
$content_kec=file_get_contents("https://kodepos-2d475.firebaseio.com/kota_kab/k69.json?print=pretty");
$content_kec=utf8_encode($content_kec);
$result_kec=json_decode($content_kec,true);

////var_dump($result);
$query_stok = "SELECT * FROM stok";
$rs_stok=mysqli_query($con,$query_stok);
echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Insert Barang</h3>
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
                <select class='form-control' id='nama' name='nama'>
                <option selected> Pilih Barang</option>";
                while($row=mysqli_fetch_array($rs_stok)){
                    echo"<option value='".$row['nama']."'>".$row['nama']."</option>";
                }
                echo"
                </select>
                </div>
                <div class='form-group'>
                <label for='jml'>Jumlah Barang</label>
                <input type='text' class='form-control' id='jml' name='jml' placeholder='Masukkan jumlah barang'>
                </div>
                <div class='row'>
                <div class='col'>
                <select  class='form-control' id='provinsi'>
                <option selected> Pilih Provinsi </option>";
                foreach ($result as  $value) {
                    echo"<option value='".$value."'>".$value."</option>";
                }

                echo"
                </select>
                </div>
                <div class='col'>
                <select  class='form-control' id='kota'>
                <option selected> Pilih Kota</option>";
                foreach ($result_kota as $key => $value_kota) {
                    echo"<option value='".$value_kota."'>".$value_kota."</option>";
                }

                echo"
                </select>
                </div>
                <div class='col'>
                <select  class='form-control' id='kecamatan'>
                <option selected> Pilih Kecamatan </option>";
                foreach ($result_kec as $key => $value_kec) {
                    echo"<option value='".$key."'> Kel.".$value_kec['kelurahan'].", Kec.".$value_kec['kecamatan']."/".$value_kec['kodepos']."</option>"; 
                }
                echo"
                </select>
                </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
            <button type='button' class='btn btn-primary' id='but_upload'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";


?>
<script>
$("#but_upload").click(function(){
  var fd = new FormData();
    var a = document.getElementById("nama").options[document.getElementById("nama").selectedIndex].value;
    var b = $("input[name=jml]").val();
    var c = document.getElementById("kota").options[document.getElementById("kota").selectedIndex].value;
    var d = document.getElementById("kecamatan").options[document.getElementById("kecamatan").selectedIndex].value;
    var e = document.getElementById("provinsi").options[document.getElementById("provinsi").selectedIndex].value;


    fd.append('nama',a);
    fd.append('jml',b);
    fd.append('kota',c);
    fd.append('kecamatan',d);
    fd.append('provinsi',e);
          $.ajax({
            url: 'insert_penjualan.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              if(response=="success"){
                alert(response);
                reloadPage(2,0,0);
              }else{
                alert(response);
              }
            },
          });
  //      }
  });
  
</script>