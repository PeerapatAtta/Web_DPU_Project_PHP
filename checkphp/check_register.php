<?php
    if(isset($_POST)){
        // print_r($_POST);
        include('../checkphp/config.php');

        //     //query 
            $username = $_POST["email-address"];
            $password = $_POST["email-password"];

            $sql = 'SELECT * FROM member Where username = "'.$username.'"';

            
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
                if ($_POST["email-password"] == $_POST["email-repassword"]) {


                    $sql = "INSERT INTO member(username,password) " . "VALUES( '$username', md5('$password'));    ";

                    $conn->query($sql);
                    session_start();
                    $_SESSION['username'] = $row["username"];
                       

                    session_write_close();    
                    header('location:../login.php?regissuc="สมัครเรียบร้อยแล้ว"');
  


                } else {

                    header('location:../register.php?passame="รหัสผ่านซ้ำ"');


                
                
                }


            }
            else{
                header('location:../register.php?noregis="ชื่อผู้ใช้ซ้ำกับในระบบ"');
            }
    
    }
    else{
        header('location:../login.php?fail="คุณไม่มีข้อมูล"');
    }
?>




