<?php
    //echo phpinfo();
    try{
        //$pdo = new PDO ( 'mysql:host=localhost;dbname=chat_Umfrage;port=3306' , 'test' , 'sÖrw3r-lokal' ) ;
        $pdo = new PDO ( 'mysql:host=10.0.0.22;dbname=chat_Umfrage;port=3306' , 'test' , 'sÖrw3r-lokal' ) ;
    } catch(PDOException $e){
        echo "Failed to connect to Database. " . $e->getMessage(); 
        //header("Location: ../src/nc.php");
    }
?>  
