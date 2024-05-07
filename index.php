<?php
   include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br><h2>Welcome to introvert family</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <label>Username</label>
    <input type="text" name="username">
    <label>Password</label>
    <input type="password" name="pass">
    <input type="submit" name="register" value="register">
    </form>
</body>
</html>
<?php
   if($_SERVER['REQUEST_METHOD']=="POST"){
       $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS);
       $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);

       if(empty($username)){
            echo "Username is not assigned";
       }
       elseif(empty($password)){
            echo "Password is not assigned";
       }
       else{
           $hash = password_hash($password, PASSWORD_DEFAULT);

           $sql = "INSERT INTO person(Username, Password) VALUES('$username','$hash')";

           try{
           mysqli_query($conn,$sql);
           echo "You are now registered";
           }
           catch(mysqli_sql_exception){
            echo "Somethig went wrong";
           }
       }
   }
?>
<?php
   mysqli_close($conn);
?>
