

<script type="text/javascript">


<?php
include('../checkphp/config.php');
session_start();

$nameforum = $_POST["nameforum"];
$txtforum = $_POST["txtforum"];

$nameforum2 = substr($nameforum, 0,1 );
$txtforum2 = substr($txtforum, 0,1);


?>




<?php
if (!empty($_POST)) {

    


    if($nameforum2 == " " || $txtforum2 == " ")
{
   header('location:../newforum.php?notempty="ห้ามขึ้นต้นด้วยค่าว่าง"');


}
else
{

     $sql = "INSERT INTO board(boardname,boardtext,usernameforum) " . "VALUES( '$nameforum', '$txtforum', '" . $_SESSION['username'] . "' );";
        $conn->query($sql);


       $sql = "  SELECT Max(ForumID) FROM board;";
       $results = $conn->query($sql);
       $row = mysqli_fetch_array($results);
       $row2 = $row[0];     
       $sql = "UPDATE board SET datepost = time2  WHERE forumID = '$row2' ";
       $conn->query($sql);
    mysqli_close($conn);
    
    


     header('location:../board.php?Page=1');
}
        
} else {
    echo 'error';
}

?>
