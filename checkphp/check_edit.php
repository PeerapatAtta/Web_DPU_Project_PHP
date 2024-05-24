<?php
include('../checkphp/config.php');
$idforum = $_GET['ForumID'];
$txtforum = $_POST["txtforum"];
$txtforum2 = substr($txtforum, 0,1);
session_start();

if (!empty($_POST)) {

  if($txtforum2 == " " )
  {
    header('location:../forum.php?notempty='. $_SESSION['idforum'].' ');

  
  
  }
  else
  {
       $sql = "UPDATE board SET boardtext = '$txtforum' , status = '1' WHERE forumID = '$idforum' ";

       
       $conn->query($sql);
     mysqli_close($conn);
    
    


      header('location:../forum.php?ForumID='.$idforum.'');
  }  
} else {
    echo 'error';
}

?>
