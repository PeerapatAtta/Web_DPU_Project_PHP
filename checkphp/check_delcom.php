<?php
include('../checkphp/config.php');
session_start();
$idforum =  $_SESSION['idforum'];
$commentid = $_GET['commentId'];



$sql = 'SELECT * FROM comment  Where ForumID =  "' . $idforum  . '" and commentId =  "' . $commentid  . '" ';
$results = $conn->query($sql);
        
while ($result = mysqli_fetch_array($results)) {
          
  if($result["usernameforum"] == $_SESSION["username"] )
  {
            

    $sql = "Delete from comment WHERE forumID = '$idforum' and commentId =  ' $commentid'  ";
     $conn->query($sql);
    
    


     mysqli_close($conn); 
   

     header('location:../forum.php?ForumID='.$idforum.'');



  }

  else{
    header('location:../forum.php?ForumID='.$idforum.'');
  }

  
}


?>
