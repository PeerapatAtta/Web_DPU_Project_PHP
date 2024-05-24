

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
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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



<div class="container">
<div class="app "> 
<div class="container mt-md-0" style="max-width: 50%; margin: auto;">

			<h1 style="color:#ffc900;" class="font1 " >PanDrift - Community</h1>



			<br>

			<?php

				if (isset($_SESSION['username'])) 
				{
					?>
	<div class="row-full">
    <div class="col-xs-12 col-sm-6" style="text-align:left;">
        <a href="./newforum.php" class="button4 btn btn-small ">ตั้งกระทู้ใหม่</a>
        <br><br>
    </div>
</div>
				<?php
				}
				?>




				<div class="row-full">
					<?php


					include('./checkphp/config.php');

					$sql = " SELECT * FROM board; ";
					$results = $conn->query($sql);
					$Num_Rows = mysqli_num_rows($results);
					$Per_Page = 3;   // Per Page

					$Page = $_GET["Page"];

					if (!$_GET["Page"]) {
						$Page = 1;
					}

					$Prev_Page = $Page - 1;
					$Next_Page = $Page + 1;

					$Page_Start = (($Per_Page * $Page) - $Per_Page);
					if ($Num_Rows <= $Per_Page) {
						$Num_Pages = 1;
					} else if (($Num_Rows % $Per_Page) == 0) {
						$Num_Pages = ($Num_Rows / $Per_Page);
					} else {
						$Num_Pages = ($Num_Rows / $Per_Page) + 1;
						$Num_Pages = (int) $Num_Pages;
					}
					$sql = "  SELECT * FROM board order by forumID Desc  LIMIT $Page_Start , $Per_Page ;";
					$results = $conn->query($sql);

					

				


					while ($result = mysqli_fetch_array($results)) {

						

	
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

					?>

					จำนวนกระทู้ทั้ง <?php echo $Num_Rows; ?> กระทู้ / มีทั้งหมด <?php echo $Num_Pages; ?> หน้า :
					<?php
					if ($Prev_Page) {
						echo " <a href='./board.php?Page=$Prev_Page'><< ย้อนกลับ</a> ";
					}

					for ($i = 1; $i <= $Num_Pages; $i++) {
						if ($i != $Page) {
							echo "[ <a href='./board.php?Page=$i'>$i</a> ]";
						} else {
							echo "<b> $i </b>";
						}
					}
					if ($Page != $Num_Pages) {
						echo " <a href ='./board.php?Page=$Next_Page'>หน้าถัดไป>></a> ";
					}
					?>
					<br>		<br>	<br>		
				
				
				</div>

			</div>
		</div>

		<br>		<br>	<br>		

		<small class="d-block mb-3 text-muted" "><font color="7f7bb7">เว็บไซต์นี้จัดทำขึ้นเพื่อการศึกษารูปแบบเว็บพันทิพย์ ไม่ได้ทำขึ้นเพื่อใช้ในเชิงพาณิชย์หรือประโยชน์ทางการค้าแต่อย่างใด.</font></small>
<small class="d-block mb-3 text-muted" "><font color="7f7bb7">This website is for educational purpose. There is no intention of copyright infringement and no actual use activities.</font></small>
</div>

</body>







</html>