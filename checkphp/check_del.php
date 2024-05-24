<?php



include('../checkphp/config.php');
session_start();
$idforum =  $_SESSION['idforum'];



$sql = 'SELECT * FROM board  Where ForumID =  "' . $idforum  . '" ';
$results = $conn->query($sql);
        
while ($result = mysqli_fetch_array($results)) {
          
  if($result["usernameforum"] == $_SESSION["username"] )
  {
            

    $sql = "Delete from board WHERE forumID = '$idforum' ";
     $conn->query($sql);
    
    
     $sql2 = "Delete from comment WHERE ForumID = '$idforum' ";
     $conn->query($sql2);
  
     $sql3 = "Delete from vote WHERE ForumID = '$idforum' ";
     $conn->query($sql3);

     $sql4 = "Delete from vote WHERE ForumID = '$idforum' ";
     $conn->query($sql4);


     mysqli_close($conn); 
   

     header('location:../board.php?Page=1');



  }

  else{
    header('location:../board.php?Page=1');

  }

  
}




?>
