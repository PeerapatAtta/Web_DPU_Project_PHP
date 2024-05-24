

<?php
    if(isset($_POST)){
        // print_r($_POST);
        include('../checkphp/config.php');



              
                    session_start();
                    $_SESSION['src'] = $_POST["Search"];
                    session_write_close();
                    header('location:../search.php?Page=1');


    
    }
    else{
        header('location:../search.php?Page=1');
    }
?>