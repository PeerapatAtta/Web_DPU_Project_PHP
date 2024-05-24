<?php
    if(isset($_POST)){
        // print_r($_POST);
        include('../checkphp/config.php');

        //     //query 
            $username = $_POST["email-address"];
            $password = $_POST["email-password"];

            $sql = 'SELECT * FROM member Where username = "'.$username.'" and password=  md5("'.$password.'") ';
            // $sql = 'SELECT * FROM member';
            $results = $conn->query($sql);
            $row = mysqli_fetch_array($results);
            // while($row = mysqli_fetch_array($results)){
            //     echo'
            //     <br>
            //     '.$row[0].'<br>
            //     '.$row[1].'<br>
            //     '.$row[2].'<br>
            //     '.$row[3].'<br>
            //     '.$row[4].'<br>
            //     <br>
            //     ';
            // }
            if(!$row){
                header('location:../login.php?fail="คุณไม่สามารถเข้าสู่ระบบได้"');
            }
            else{
                session_start();
                $_SESSION['username'] = $row["username"];
                session_write_close();
                header('location:../index.php?success="เข้าสู่ระบบสำเร็จ"');
            }
    
    }
    else{
        header('location:../login.php?fail="คุณไม่มีข้อมูล"');
    }
?>