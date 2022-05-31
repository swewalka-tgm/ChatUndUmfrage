<?php
    //echo phpinfo();
    try{
        //$pdo = new PDO ( 'mysql:host=localhost;dbname=chat_Umfrage;port=3306' , 'test' , 'sÖrw3r-lokal' ) ;
        $pdo = new PDO ( 'mysql:host=192.168.164.128;dbname=chatUmfrage;port=3306' , 'student_admin' , 'dbstudent' ) ;
    } catch(PDOException $e){
        echo "Failed to connect to Database. " . $e->getMessage(); 
        //header("Location: ../src/nc.php");
    }
?>  
