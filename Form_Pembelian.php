<?php
include "db=connection.php";
//var_dump($query);

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
                <input type='text' class='form-control' id='nama' name='nama' placeholder='Masukkan nama barang'>
                </div>
                <div class='form-group'>
                <label for='jml'>Jumlah Barang</label>
                <input type='text' class='form-control' id='jml' name='jml' placeholder='Masukkan jumlah barang'>
                </div>
                <div class='form-group'>
                <label for='jml'>Harga Barang/pc</label>
                <input type='text' class='form-control' id='harga' name='harga' placeholder='Masukkan harga barang'>
                </div>
                <div class='form-group'>
                <label for='exampleInputFile'>input Gambar</label>
                <div class='input-group'>
                    <div class='custom-file'>
                      <input name='fileToUpload' id='fileToUpload' accept='image/*' type='file' />
                    </div>
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
    var a = $("input[name=nama]").val();
    var b = $("input[name=jml]").val();
    var c = $("input[name=harga]").val();
    var files = $('#fileToUpload')[0].files[0];

    fd.append('fileToUpload',files);
    fd.append('name',a);
    fd.append('jml',b);
    fd.append('harga',c);

    // if($('#fileToUpload')[0].files.length<1){
    //     alert('Harus Mengisi Gambar Terlebih Dahulu!');
    //     }else{
     //     alert(files);
          $.ajax({
            url: 'insert_pembelian.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              if(response=="success"){
                alert(response);
                reloadPage(1,0,0);
              }else{
                alert(response);
              }
            },
          });
  //      }
  });
  
</script>