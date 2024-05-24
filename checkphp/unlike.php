<?php

session_start();
include('./config.php');

$username = $_SESSION['username'];
$idforum = $_SESSION['idforum'];

if (isset($_SESSION['username'])) 
 {
 	$sql3 = 'SELECT * FROM unvote Where usernamevote = "'.$_SESSION['username'].'"  and forumid = "' .$_SESSION['idforum']  . '" ';

	$results3 = $conn->query($sql3);
	$result3 = mysqli_fetch_array($results3);
 	if ($result3['usernamevote'] == $_SESSION['username'] && $result3['forumid'] == $_SESSION['idforum'] && $result3['vote_m'] = '1' ) {
         
        

      header('location:../forum.php?ForumID='.$_SESSION['idforum'].'');



 	}
 	else{
		
      $sql4 = "INSERT INTO unvote(usernamevote,vote_m,forumid) " . "VALUES( '".$_SESSION['username']."', '1', '".$_SESSION['idforum']."' );";
    $results4 = $conn->query($sql4); 		
      $sql = 'DELETE FROM vote  Where usernamevote = "'.$_SESSION['username'].'"  and forumid = "' .$_SESSION['idforum']  . '" ';
      $conn->query($sql);
      mysqli_close($conn);	
							
      header('location:../forum.php?ForumID='.$_SESSION['idforum'].'');

 	}


 }	
?>