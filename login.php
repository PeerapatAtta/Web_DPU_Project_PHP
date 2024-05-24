

<?php

    session_start();
	if (isset($_SESSION['username'])) 
	{

		header('location:./board.php?Page=1');

	}

	else{

	
?>



<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.6">
	<title>เข้าสู่ระบบ - PanDift Community</title>
<?php
	include('boostrap.php');?>
	<!-- Custom styles for this template -->
</head>

<body class="text-center">


	<div class="card card-login mx-auto text-center" style=" background-color: #2d2a49; " >
		<div class="card-header mx-auto" style="    background-color: #2d2a49; ">

			<div class="app">
				<div class="container mt-2">
					<br>
					<div class="row-full">


						<form class="form-signin" method="post" action="./checkphp/check_login.php">
							<div class="col">

								<img class="mb-4" src="pic/logo.png" alt="" width="200" height="72">
								<h1 class="h3 mb-3 font-weight-normal">ยินดีต้อนรับเข้าสู่เว็บ PanDrift</h1>
								<br>

								<div class="card-body">
									<div class="form-group row">
										<label for="email_address" class="col-md-5 col-form-label text-md-left">ชื่อผู้ใช้งาน</label>
										<div class="col-md-7">
											<input type="text" id="email-address" class="form-control" placeholder="ชื่อผู้ใช้งาน" name="email-address" required autofocus  value pattern="^[a-zA-Z0-9]+$"  title="กรุณากรอกชื่อผู้ใช้ภาษาอังกฤษหรือตัวเลขเท่านั้น">
										</div>

										<label for="password" class="col-md-5 col-form-label text-md-left">รหัสผ่าน</label>
										<div class="col-md-7">
											<input type="password" id="email_password" placeholder="รหัสผ่าน" class="form-control" name="email-password" required autofocus value pattern="^[a-zA-Z0-9]+$"  title="กรุณากรอกรห้สผ่านภาษาอังกฤษหรือตัวเลขเท่านั้น" >
										</div>
									</div>
						</form>
						<button class=" button2 btn btn-lg  btn-block" type="submit">เข้าสู่ระบบ</button>
						<a href="./register.php" class=" button3 btn btn-lg  btn-block">สมัครสมาชิก</a>


						<p class="mt-5 mb-3 text-muted">PanDrift &copy; 2024</p>






					</div>
					<div class="col mt-2" style="text-align:right">
					</div>
					</form>
				</div>




			</div>
		</div>
		

	

</body>
<?php
	}
?>



<?php
if (isset($_GET['fail'])) {
?>
	<script type="text/javascript">
		swal("ไม่สามารถเข้าสู่ระบบได้!", "ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง!", "error").then(function() {
                        window.location = "login.php";
                    });
	</script>
<?php
}
?>


<?php
if (isset($_GET['regissuc'])) {
?>
	    <script type="text/javascript">
    
	swal("ทำการสมัครเรียบร้อย", "ยินดีต้อนรับเข้าสู่เว็บ Pandrift", "success").then(function() {
	  window.location = "login.php";
  });
		

	</script>


<?php
}
?>




</html>

