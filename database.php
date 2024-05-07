<?php
     $db_server = "localhost";
     $db_user = "root";
     $db_password = "";
     $db_name ="demo";

     $conn = "";

    try{
        $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name);
        echo "Connect successfully";
    }
    catch(mysqli_sql_exception){
        echo "Something went wrong";
    }
?>