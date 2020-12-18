<?php
// mengaktifkan session
session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
// if($_SESSION['status'] !="login"){
// 	header("location:login.php");
// }
	include "header.php";

	include "navbar.php";

	include "db=connection.php";
?>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php

	echo "<div id='divDashboard'>";

	include "dashboard.php";

	echo "</div>";

	echo "<div id='divReloadPage'>

	</div>";

?>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<script>

	$(document).ready(function(){

		$("#divLandTour").hide();

		$("#li1").addClass('active');

		$("#li1").addClass('menu-open');

		$("#ali1").addClass('active');

		$("#a11").addClass('active');

	});



	function logOut(){	

	}

	function reloadPage(x,y,z){

		$("#divDashboard").hide();

		$("#divReloadPage").show();

		if(x==1){

			$.ajax({

				url:"Pembelian.php",

				method: "POST",

				asynch: false,

				data:{id:y},

				success:function(data){

					console.log(data)

					$("#divReloadPage").html(data);

				}

			});

		}else if(x==2){

			$.ajax({

				url:"stok.php",

				method: "POST",

				asynch: false,

				data:{id:y},

				success:function(data){

					console.log(data)

					$("#divReloadPage").html(data);

				}

			});
		}else if(x==3){

			$.ajax({

				url:"penjualan.php",

				method: "POST",

				asynch: false,

				data:{id:y},

				success:function(data){

					console.log(data)

					$("#divReloadPage").html(data);

				}

			});
		}
	}

function movePage(x,y,z){

$("#divDashboard").hide();

$("#divReloadPage").show();

if(x==1){

	$.ajax({

		url:"Form_Pembelian.php",

		method: "POST",

		asynch: false,

		data:{id:y},

		success:function(data){

			console.log(data)

			$("#divReloadPage").html(data);

		}

	});

}else if(x==2){

	$.ajax({

		url:"stok.php",

		method: "POST",

		asynch: false,

		data:{id:y},

		success:function(data){

			console.log(data)

			$("#divReloadPage").html(data);

		}

	});
}else if(x==3){

	$.ajax({

		url:"Form_penjualan.php",

		method: "POST",

		asynch: false,

		data:{id:y},

		success:function(data){

			console.log(data)

			$("#divReloadPage").html(data);

		}

	});
}
}

function insertPage(x,y,z){
	$("#divDashboard").hide();
	$("#divReloadPage").show();
	if(x==0){
		$.ajax({
			url:"formInsertStaff.php",
			method: "POST",
			asynch: false,
			data:{id:y},
			success:function(data){
				console.log(data)
				$("#divReloadPage").html(data);
			}
		});
	}else if(x==1){
		$.ajax({
			url:"formInsertStok.php",
			method: "POST",
			asynch: false,
			data:{id:y},
			success:function(data){
				console.log(data)
				$("#divReloadPage").html(data);
			}
		});
	}else if(x==2){
		$.ajax({
			url:"formInsertPembelian.php",
			method: "POST",
			asynch: false,
			data:{id:y},
			success:function(data){
				console.log(data)
				$("#divReloadPage").html(data);
			}
		});
	}
}


function editPage(x,y,z,c){

$("#divDashboard").hide();

$("#divReloadPage").show();

if(x==1){

	$.ajax({

		url:"Form_Update_Pembelian.php",

		method: "POST",

		asynch: false,

		data:{id:y,tid:z,tourpricepackage:c},

		success:function(data){

			console.log(data)

			$("#divReloadPage").html(data);

		}

	});

}else if(x==2){

	$.ajax({

		url:"formUpdateguru.php",

		method: "POST",

		asynch: false,

		data:{id:y,tid:z,tourpricepackage:c},

		success:function(data){

			console.log(data)

			$("#divReloadPage").html(data);

		}

	});

}

}





function hideShow(x,y,z){

if(z==0){

	$("#li"+x).addClass('active');

}



for (i = 1; i < 10; i++) { 

	$("li"+i).removeClass('menu-open');

	$("li"+i).removeClass('active');

	$("#ali"+i).removeClass('active');

	for(j = 0; j < 10; j++){

		$("#a"+i+j).removeClass('active');

	}

}



$("#ali"+x).addClass('active');

$("#a"+x+y).addClass('active');

if(x==1){

	$("#divDashboard").show();

	$("#divReloadPage").hide();

}

}


</script>  