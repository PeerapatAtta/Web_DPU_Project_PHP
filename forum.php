<?php

session_start();
$idforum = $_GET['ForumID'];
$_SESSION["idforum"] = $idforum;

include('./checkphp/config.php');

$sql = 'UPDATE board SET view = view + 1 ,dateedit = dateedit WHERE ForumID = "' . $idforum  . '"';
$results = $conn->query($sql);



?>


<?php

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
		.fa {
			font-size: 30px;
			cursor: pointer;
			user-select: none;
			color: white;

		}


		.fa:hover {
			color: darkblue;
		}
	</style>


</head>

<body class="text-center">

	<br><br><br><br><br><br><br><br>


	</div>
	<div class="app col-xs-5 col-sm-5 col-md-5 col-lg-12" style="width: 45%; height: 45%; margin: auto;">
		<div class="container mt-5">
			<h1 style="color:#ffc900;" class="font1 ">PanDrift - Community</h1>

			<br>
			<div class="row-full">
				<div class="row-full">


					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<!-- กระทู้ -->
					<?php
					include('./checkphp/config.php');

	
					$sql4 = 'SELECT count(vote_m) FROM vote Where forumid =  "' . $idforum  . '" ';
					$results4 = $conn->query($sql4);
					$result4 = mysqli_fetch_array($results4);

					$sql5 = 'SELECT count(vote_m) FROM unvote Where forumid =  "' . $idforum  . '" ';
					$results5 = $conn->query($sql5);
					$result5 = mysqli_fetch_array($results5);

					$sql = 'SELECT * FROM board  Where ForumID =  "' . $idforum  . '" ';
					$results = $conn->query($sql);
				

					while ($result = mysqli_fetch_array($results)) {

						echo '<div style= "background-color: #193366; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
						<br>
						<div class="col-12" style="text-align:left" >

						<h4 style="color:#ffc900;" class="font1 navbar-brand " >' . $result["boardname"] . ' </h4> 
						<i class="fa" aria-hidden="true">&#xf075;</i>

						</div>';

						if (isset($_SESSION['username'])) {
							if ($result["usernameforum"] == $_SESSION["username"]) {

								echo '
							<div class="col" style="text-align:right">
							<a href="./edit.php?ForumID=' . $idforum . '&username=' . $result["usernameforum"] . ' " class="button btn btn-small " style="background-color: #4CAF50;
							/* Green */
							border: none;
							color: white;
							padding: 1px 1px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 10px;
							box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">✎</a>&nbsp;&nbsp;
						

							';

							

						
							echo '
						
								<a href="./checkphp/check_del.php?idforum="' . $idforum  . '"" onclick="return confirm(\'คุณแน่ใจหรือว่าต้องการลบรายการนี้?\');"><button>x</button></a>
							';
						}
							
						} else {
						}


					?>





						<?php

						echo '

				

						<br>
						<div class="col" style="text-align:left" >
						<font face="tahoma,augsanaupc" size="4" color="white">' . $result["boardtext"] . '</font>
						<br>
						<br>
					';

						if ($result["status"] == 1) {
							echo '
						<br>
						<div class="col" style="text-align:left">
						"แก้ไขข้อความเมื่อ  : 
						<a> ' . $result["dateedit"] . ' " </a>
					</div>	
					<br>

						';
						}

						if (isset($_SESSION['username'])) 
						{
						?>


<!-- 
<?php


 if (isset($_SESSION['username'])) 
 {
 	$sql3 = 'SELECT * FROM vote Where usernamevote = "'.$_SESSION['username'].'"  and forumid = "' . $idforum  . '" ';

	$results3 = $conn->query($sql3);
	$result3 = mysqli_fetch_array($results3);
 	if ($result3['usernamevote'] == $_SESSION['username'] && $result3['forumid'] == $_SESSION['idforum'] && $result3['vote_m'] = '0' ) {
		 
		$sql4 = "INSERT INTO vote(usernamevote,vote_m,forumid) " . "VALUES( '".$_SESSION['username']."', '1', '$idforum' );";
		$results4 = $conn->query($sql4); 	


 	}
 	else{
		
													

 	}


 }	
	
?>
					 -->




						
<br>



					<?php

									


						}

	
						echo '	
						<hr style="  border: 0.4px solid white;
						">
					
						<br>
						<div class="col-12">
						';
						if (isset($_SESSION['username'])) 
						{

						echo '<a href="./checkphp/like.php"><i class="fa fa-thumbs-up"></i></a>';
						
						}

						echo' จำนวนผู้ที่ชื่นชอบ :			
						<font face="tahoma,augsanaupc" size="4" color="red">' . $result4["count(vote_m)"] . '</font>
						&nbsp | &nbsp

						';

							if (isset($_SESSION['username'])) 
						{

							echo '
						<a href="./checkphp/unlike.php"><i class="fa fa-thumbs-down"></i></a>';
						}

						echo'
						จำนวนผู้ที่ไม่ชื่นชอบ :			
						<font face="tahoma,augsanaupc" size="4" color="red">' . $result5["count(vote_m)"] . '</font>
					
						</div>
						</div>
							<div class="col" style="text-align:right">
							<br>
								ผู้ตั้งกระทู้ : 
								<a> ' . $result["usernameforum"] . ' </a>
							
							</div>	

								<div class="col" style="text-align:right">
								
									เวลาที่ตั้งกระทู้ : 
									<a> ' . $result["datepost"] . ' </a>
								</div>
								<br>
						</div>
						<br>
						</div>
						</div>
					';
					}

					?>



					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->



					<?php
					include('./checkphp/config.php');

					$sql = 'SELECT * FROM board As d1 INNER JOIN comment AS d2  Where d1.ForumID =  "' . $idforum  . '" and d2.ForumID =  "' . $idforum  . '"';
					$results = $conn->query($sql);
					$i = 0;
					while ($result = mysqli_fetch_array($results)) {
						$i = $i + 1;
						echo '
						<div style= "background-color: #222244; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
							<br>
							<div class="col" style="text-align:left">
	
							<h4 style="color:#ffc900;" class="font1 navbar-brand " >ความคิดเห็นที่ ' . $i . '</h4>
	
							</div>
							';
						if (isset($_SESSION['username'])) {
							if ($result["usernameforum"] == $_SESSION["username"]) {

								echo '
							<div class="col" style="text-align:right">
							<a href="./editcom.php?ForumID=' . $idforum . '&commentId=' . $result["commentId"] . '&username=' . $result["usernameforum"] . ' " class="button btn btn-small " style="background-color: #4CAF50;
							/* Green */
							border: none;
							color: white;
							padding: 1px 1px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 10px;
							box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">✎</a>
							
							<a href="./checkphp/check_delcom.php?ForumID=' . $idforum . '&commentId=' . $result["commentId"] . '&username=' . $result["usernameforum"] . ' " 
							onclick="return confirm(\'คุณแน่ใจหรือว่าต้องการลบรายการนี้?\');"><button>x</button></a>




							</div>
						
							';
							}
						} else {
						}



						echo '	
	
							<div class="col" style="text-align:left">
							<font face="tahoma,augsanaupc" size="4" color="white">' . $result["commentuser"] . ' </font>
							

						';


						if ($result["statuscomment"] == 1) {
							echo '
						
							<div class="col" style="text-align:left">
							<br>
							"แก้ไขข้อความเมื่อ  : 
							<a> ' . $result["edittime"] . ' " </a>
							</div>	
	
							';
						}





						echo '
					
				
					
	
							<div class="col" style="text-align:right">
							ผู้ตอบกระทู้ : 

							<a> ' . $result["usernameforum"] . ' </a>
							</div>	
							<div class="col" style="text-align:right">
							เวลาที่ตอบกระทู้ : 
							<a> ' . $result["datecomment"] . ' </a>
							</div>	
							</div>
							<hr>
							</div>

							
							
							
						

						
						
						';
					}





					?>
					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->
					<!-- ตอบกระทู้ -->

					<?php

					if (isset($_SESSION['username'])) {
					?>

						<div class="row-full" >
							<div class="col-2" style="text-align:left">
								<br><br>
							</div>
							<div class="forumco2" style="background-color: #093a43; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
								<div class="row-full">
									<form method="post" action="./checkphp/comment.php">
										<div class="col">
											<br>
											<div class="col-12" style="text-align:left" style="width: 450%; margin: auto;">
												<font face="tahoma,augsanaupc" size="4" color="white" ><label for="w3mission">แสดงความคิดเห็น</label></font>
											</div>
											<textarea rows="10" cols="50" class="control form-control  mt-2" aria-label="With textarea" id="textpost" name="txtforum" style="resize:none; background-color:#0e5c6a; color:#ffff;     font-size: 20px;"></textarea>


										</div>
										<div class="col mt-2" style="text-align:right">
											<button class="button4 btn btn-small" type="submit">ส่งกระทู้</button><br><br>

											ตอบกระทู้โดยคุณ <?php
															echo  $_SESSION["username"];
															?>

										</div>
										<br>
								</div>
								
							</div>



						<?php
					}
						?>


						<br><br><br>
						<br>		<br>	<br>		

						<small class="d-block mb-3 text-muted" "><font color="7f7bb7">เว็บไซต์นี้จัดทำขึ้นเพื่อการศึกษารูปแบบเว็บพันทิพย์ ไม่ได้ทำขึ้นเพื่อใช้ในเชิงพาณิชย์หรือประโยชน์ทางการค้าแต่อย่างใด.</font></small>
<small class="d-block mb-3 text-muted" "><font color="7f7bb7">This website is for educational purpose. There is no intention of copyright infringement and no actual use activities.</font></small>

</body>


<?php
if (isset($_GET['notempty'])) {


	echo '
	<script type="text/javascript">
		swal("กรุณากรอกข้อความ!", "ห้ามขึ้นตัวด้วยตัวอักษรเว้นว่าง!", "error").then(function() {
			window.location = "forum.php?ForumID=' . $_SESSION["idforum2"] . '";
		});
    </script>';
}
?>



</html>