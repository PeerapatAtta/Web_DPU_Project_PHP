<?php
session_start();

$idforum = $_GET['ForumID'];
$commentid = $_GET['commentId'];
$_SESSION["commentId"] =$commentid;
$_SESSION["ForumID"] =$idforum;
$exit = "location:./board.php?Page=1";
$usernameforum = $_GET['username'];


if (isset($_SESSION['username']) == $usernameforum) 
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




	<div class="app"  style="width: 50%; height: 50%; margin: auto;">
		<div class="container mt-5">

			<h1 style="color:#ffc900;" class="font1 ">แก้ไขความคิดเห็น PanDrift - Community</h1>

            <?php
					include('./checkphp/config.php');

					$sql = 'SELECT * FROM comment  Where commentId =  "' . $commentid  . '"';
                    $results = $conn->query($sql);
                    while ($result = mysqli_fetch_array($results)) {    
         
                        if($result["usernameforum"] == $_SESSION["username"] )
						{
                        echo'

			<br>
			<div class="row-full">
				<div class="col-2" style="text-align:left">
					<br><br>
				</div>
				<div class="forumco">
					<div class="row-full">
						<form method="post" action="./checkphp/check_editcomment.php?ForumID='.$idforum.'&commentId='.$commentid.'">
							<div class="col">
                                <br>
                    
								<div class="col-12" style="text-align:left">
									<font face="tahoma,augsanaupc" size="4" color="white" ><label for="w3mission"  >แก้ไขความคิดเห็น</label></font>
								</div>
                                <textarea rows="10" cols="50" class="control form-control  mt-2" aria-label="With textarea" 
                                id="commentuser" name="commentuser" style="resize:none; background-color:#335087; color:#ffff;     font-size: 20px;" required autofocus>' . $result["commentuser"] . '</textarea>


							</div>
							<div class="col mt-2" style="text-align:right">
								<button class="button4 btn btn-small" type="submit">แก้ไขความคิดเห็น</button><br><br>
								
								แก้ไขความคิดเห็นโดยคุณ 
													 '. $_SESSION["username"].'
												
							</div>
							<br>
						</form>
					</div>

				</div>
			</div>
        </div>
       

        ';   
                        } else{
                            
                        }
      
                     
      
      
      } ?>


            

<br>		<br>	<br>		

<small class="d-block mb-3 text-muted" "><font color="7f7bb7">เว็บไซต์นี้จัดทำขึ้นเพื่อการศึกษารูปแบบเว็บพันทิพย์ ไม่ได้ทำขึ้นเพื่อใช้ในเชิงพาณิชย์หรือประโยชน์ทางการค้าแต่อย่างใด.</font></small>
<small class="d-block mb-3 text-muted" "><font color="7f7bb7">This website is for educational purpose. There is no intention of copyright infringement and no actual use activities.</font></small>
</body>

<?php
}
else{

	header($exit);

}
?>

<?php
if (isset($_GET['notempty'])) {


	echo'
	<script type="text/javascript">
		swal("ห้ามเว้นว่าง!", "กรุณากรอกข้อความ!", "error").then(function() {
			window.location = "editcom.php?ForumID='.$_SESSION["idforum"].'&commentId='.$_SESSION["commentId"].'";
		});
    </script>';

    } 
?>


</html>

