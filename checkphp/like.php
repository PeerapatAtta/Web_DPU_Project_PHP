<?php

session_start();
include('./config.php');


if (isset($_SESSION['username'])) 
 {
 	$sql3 = 'SELECT * FROM vote Where usernamevote = "'.$_SESSION['username'].'"  and forumid = "' .$_SESSION['idforum']  . '" ';

	$results3 = $conn->query($sql3);
	$result3 = mysqli_fetch_array($results3);
 	if ($result3['usernamevote'] == null && $result3['forumid'] == null && $result3['vote_m'] == null ) {
		 
     
	  $sql4 = "INSERT INTO vote(usernamevote,vote_m,forumid) " . "VALUES( '".$_SESSION['username']."', '1', '".$_SESSION['idforum']."' );";
	  $results4 = $conn->query($sql4); 	
	  $sql = 'DELETE FROM unvote  Where usernamevote = "'.$_SESSION['username'].'"  and forumid = "' .$_SESSION['idforum']  . '" ';
	  $conn->query($sql);
	  mysqli_close($conn);	
	  header('location:../forum.php?ForumID='.$_SESSION['idforum'].'');


 	}
 	else{
	

	   header('location:../forum.php?ForumID='.$_SESSION['idforum'].'');
	  



 	}


 }	
?>