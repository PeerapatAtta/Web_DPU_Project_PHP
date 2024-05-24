<?php
session_start();


if (isset($_SESSION['username'])) 
{

?>



<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.6">
	<title>เว็บบอร์ด - PanDift Community</title>
	<?php
	include('boostrap.php');

	?>

	<!-- Custom styles for this template -->
</head>

<body class="text-center">







	<br><br><br><br><br><br><br><br>




	<div class="app" style="width: 50%; height: 50%; margin: auto;">
		<div class="container mt-5">

			<h1 style="color:#ffc900;" class="font1 ">ตั้งกระทู้ใหม่ PanDrift - Community</h1>



			<br>
			<div class="row-full">
				<div class="col-2" style="text-align:left">
					<br><br>
				</div>
				<div class="forumco">
					<div class="row-full">
						<form method="post" action="./checkphp/new.php">
							<div class="col">
								<br>
								<div class="col-12" style="text-align:left">
									<font face="tahoma,augsanaupc" size="4" color="white"><label for="w3mission">1. ระบุคำถามของคุณ เช่น เว็บ PanDrift ก่อตั้งเพื่ออะไร ใครพอทราบบ้าง?</label></font>

								</div>

								<input  style="background-color:#335087; color:#ffc900; font-size: 20px;" type="text" id="nameforum" name="nameforum" placeholder="หัวข้อคำถาม" class="col-md-12 col-form-label text-md-left" required="required" autofocus ><br>
								<br>
								<div class="col-12" style="text-align:left">
									<font face="tahoma,augsanaupc" size="4" color="white"><label for="w3mission">2.เขียนรายละเอียดของคำถาม</label></font>
								</div>
								<textarea rows="10" cols="50" class="control form-control  mt-2" aria-label="With textarea" id="textpost" name="txtforum" style="resize:none; background-color:#335087; color:#ffff;     font-size: 20px;" required="required" autofocus></textarea>


							</div>
							<div class="col mt-2" style="text-align:right">
								<button class="button4 btn btn-small" type="submit">ส่งกระทู้</button><br><br>
								
								ตั้งกระทู้โดยคุณ <?php
													echo  $_SESSION["username"];
													?>
						
							</div>
							<br>
						</form>
					</div>

				</div>
			</div>
		</div>



		<br>		<br>	<br>		

		<small class="d-block mb-3 text-muted" "><font color="7f7bb7">เว็บไซต์นี้จัดทำขึ้นเพื่อการศึกษารูปแบบเว็บพันทิพย์ ไม่ได้ทำขึ้นเพื่อใช้ในเชิงพาณิชย์หรือประโยชน์ทางการค้าแต่อย่างใด.</font></small>
<small class="d-block mb-3 text-muted" "><font color="7f7bb7">This website is for educational purpose. There is no intention of copyright infringement and no actual use activities.</font></small>


</body>

<?php


}
else{
	
	header('location:./board.php?Page=1');

}
?>


<?php
if (isset($_GET['notempty'])) {
?>
	<script type="text/javascript">
		swal("กรุณากรอกข้อความ!", "ห้ามขึ้นตัวด้วยตัวอักษรเว้นว่าง ช่องที่ 1 และ 2 !", "error").then(function() {
			window.location = "newforum.php";
		});
	</script>
<?php


}
?>

</html>

