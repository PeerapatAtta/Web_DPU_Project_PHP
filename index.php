

<?php
session_start();


// นับจำนวนตอบกระทู้  นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ 
include('./checkphp/config.php');

$sqlrepaly = 'SELECT Max(ForumID)+1 FROM board';
$resultsrepaly = $conn->query($sqlrepaly);
$rowrepaly = mysqli_fetch_array($resultsrepaly);
$row3 = $rowrepaly[0];    


for($i = 0 ; $i < $row3  ; $i++)
{


	$sql = 'SELECT count(d2.ForumID) FROM board As d1 INNER JOIN comment AS d2  Where d1.ForumID =  "' .$i  . '" and d2.ForumID =  "' . $i . '"';
	$results = $conn->query($sql);
	$row = mysqli_fetch_array($results);
	$row2 = $row[0];    
	$sql = "UPDATE board SET replys = '$row2' WHERE forumID = '$i' ";
	$conn->query($sql);
	
}
mysqli_close($conn);



// นับจำนวนตอบกระทู้  นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ นับจำนวนตอบกระทู้ 
?> 



<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.6">
	<title>เว็บบอร์ด - PanDift Community</title>
	<?php
	include('boostrap.php');

	

	?>

<style type="text/css">
html, body{
padding:0px;
margin:0px;
height:100%;
width: 100%;
}
</style>
</head>





<body class="text-center">









<br><br><br><br><br><br><br><br>




	<div class="app "> 
		<div class="container mt-2 mt-md-0"  style="width: 50%; height: 50%; margin: auto;" >

		<h1 style="color:#ffc900;" class="font1 " >PanDrift - Community </h1>
			<h3 style="color:#ffc900;" class="font1 " >Top 3 Forum This week</h3>
 


			<br>

			<?php

				if (isset($_SESSION['username'])) 
				{
					?>
						<div class="row-full">
						
							

				<?php
				}
				?>




				<div class="row-full">
					<?php


					include('./checkphp/config.php');

					$sql = "SELECT * FROM board Where datepost BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() Order by view desc LIMIT 0,3;
					";
					$results = $conn->query($sql);
					while ($result = mysqli_fetch_array($results)) {
						if($result  == 0 )
						{
	
							echo ' <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <font color="#666666" size =" 10">ไม่พบกระทู้ที่ท่านต้องการ</font> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br>';
	
						}
						else
						{
						

	
						echo '
						
					

						<div class="aaa col-xs-3 col-sm-3 col-md-3 col-lg-12" >
						<br>
						<h4 style="color:#ffc900;" class="font1 navbar-brand">หมายเลขกระทู้ ' . $result["ForumID"] . ' </h4>
						<div class="col" style="text-align:left">
						<a href="./forum.php?ForumID=' . $result["ForumID"]. ' "><font face="tahoma,augsanaupc" size="4" color="white">' . $result["boardname"] . '</font></a>
		
					
						';
						
					

			
						echo '

						<div class="col" style="text-align:right">
									อ่าน : 
									<a> ' . $result["view"] . ' </a>
									ครั้ง
									&nbsp;
									ตอบ :
									<a> ' . $result["replys"] . ' </a>
									ครั้ง
						</div>

							<div class="col" style="text-align:right">
								ผู้ตั้งกระทู้ : 
								<a> ' . $result["usernameforum"] . ' </a>
							</div>	

								<div class="col" style="text-align:right">
									เวลาที่ตั้งกระทู้ : 
									<a> ' . $result["datepost"] . ' </a>
								</div>
						</div>
					
				
						
						<hr>

					
						</div>
						';
						}
					}

					?>

				
				</div>

			</div>
		</div>

<button class="btn btn-primary" type="submit">  <a class="nav-link" href="./board.php?Page=1"><font face="tahoma,augsanaupc" size="4" color="white">เข้าสู่เว็บบอร์ด</font></a></button>
<br><br><br>
<small class="d-block mb-3 text-muted" "><font color="7f7bb7">เว็บไซต์นี้จัดทำขึ้นเพื่อการศึกษารูปแบบเว็บพันทิพย์ ไม่ได้ทำขึ้นเพื่อใช้ในเชิงพาณิชย์หรือประโยชน์ทางการค้าแต่อย่างใด.</font></small>
<small class="d-block mb-3 text-muted" "><font color="7f7bb7">This website is for educational purpose. There is no intention of copyright infringement and no actual use activities.</font></small>
</body>







<?php
if (isset($_GET['success'])) {
	?>
		<script type="text/javascript">
			swal("เข้าสู่ระบบสำเร็จ!", "ยินดีต้อนรับเข้าสู่เว็บไซต์ Pandrift", "success").then(function() {
							window.location = "board.php?Page=1";
						});
		</script>
	<?php
	}
	?>






</html>

