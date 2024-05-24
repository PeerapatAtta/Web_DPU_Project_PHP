<?php
include('../checkphp/config.php');
session_start();

$txtforum = $_POST["txtforum"];
$txtforum2 = substr($txtforum, 0,1);
$_SESSION['idforum2'] = $_SESSION['idforum'];

if (!empty($_POST)) {


    if( $txtforum2 == " ")
    {

        header('location:../forum.php?notempty='. $_SESSION['idforum'].' ');
    }
    else
    {
        
     $sql = "INSERT INTO comment(commentuser,ForumID,usernameforum) " . "VALUES( '$txtforum', '" . $_SESSION['idforum'] . "', '" . $_SESSION['username'] . "' );";
     $conn->query($sql);
     $sql2 = "  SELECT Max(commentId) FROM comment;";
     $results2 = $conn->query($sql2);
     $row = mysqli_fetch_array($results2);
     $row2 = $row[0];     

    mysqli_close($conn);

   


      header('location:../forum.php?ForumID='. $_SESSION['idforum'].' ');

    
    }

} else {
    echo 'error';
}

?>
