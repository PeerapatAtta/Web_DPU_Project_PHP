<?php
include('../checkphp/config.php');
session_start();
$idforum = $_GET['ForumID'];
$commentid = $_GET['commentId'];
$commentuser = $_POST["commentuser"];
$commentuser2 = substr($commentuser, 0,1);







if (!empty($_POST)) {

 
  if($commentuser2 == " ")
  {

    header('location:../forum.php?notempty='. $_SESSION['idforum'].' ');

  }
  else{  
       $sql = "UPDATE comment SET commentuser = '$commentuser' , statuscomment = '1' WHERE commentId = '$commentid' ";
       $conn->query($sql);
     mysqli_close($conn);
    
    

        print_r( $sql);
  header('location:../forum.php?ForumID='.$idforum.'');

  }   
} else {
    echo 'error';
}

?>


