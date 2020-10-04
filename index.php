<?php
$username = "";
$password = "";

if(isset($_POST["subbtn1"])){
   $username = $_POST["username"];
   $password = $_POST["password"];
    if($username == "yobah" && $password == "yobah11111"){
        header("Location: api_url.php");
    }else{
        echo "<script> alert('Invalid username/password');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/83d4dedb1b.js" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
</head>
<body>

<div id = "mailsender">       
<div id = "item">
        
        <form method="POST" action = "index.php">
        <i class="fa fa-user" style = "font-size: 100px"></i><div class = "input" style = "border: none;">.</div><br/>
            <input class = "input" name = "username" type="text" placeholder="username" value = "<?php echo $username ?>" required /> <br>
            <div>.</div>
            <input class = "input" name = "password" type="password" placeholder="password" value = "<?php echo $password ?>" required /> <br>
            <input  class = "input" id = "button" type="submit" name = "subbtn1" value = 'Sign in'/><br/>
        </form>

</div>
</div>

</body>
</html>