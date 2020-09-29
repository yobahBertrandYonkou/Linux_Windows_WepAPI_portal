<?php
session_start();
$version = "";
$contPort = "";
$exPort = "latest";
$name = "";
$image = "";
$response = "";
$status = "";
$mail_api = "";

if(isset($_POST["subbtn"])){
    $sender = $_POST["sender"];
    $msg = $_POST["msg"];
    $receiver = $_POST["receiver"];
    $pass = $_POST["pass"];
    $mail_api = $_SESSION["api_url"]."/cgi-bin/mail.py?sender=$sender&pass=$pass&receiver=$receiver&msg=$msg";
    $response = file_get_contents($mail_api);
    

    if($response != null){
        $status = "SENT";
    }else{
        $status = "FAILED";
    }
    //header("Location: $mail_api");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/83d4dedb1b.js" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/docker.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker API</title>
</head>
<body> 
<div id = "home">
    <a href = 'main.php'><i class='fas fa-home' style = 'font-size: xx-large'></i> HOME</a>
    <a href = "#container">CONTAINER</a>
    <a href = "#network">NETWORK</a>
    <a href = "#status1">STATUS</a>
    <a href = "#images">IMAGES</a>
</div>
<div id = "docker">
<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "mail.php">
            <div id = "name"> LAUNCH A CONTAINER</div><br/>
            <input class = "input" name = "name" type="text" placeholder="container name" value = "<?php echo $name?>" required/><br/>
            <select name = "image">
                <option>wordpress</option>
                <option>centos</option>
                <option>ubuntu</option>
                <option>redhat</option>
                <option>mysql</option>
        </select> <br/>            
            <input class = "input" name = "version" type="text" placeholder="image version" value = "<?php echo $version ?>" required/><br/>
            <input class = "input" name = "cont_port" type="email" placeholder="container port" value = "<?php echo $contPort ?>" required/><br/>
            <input class = "input" name = "ex_port" type="email" placeholder="expose port" value = "<?php echo $exPort ?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "Launch" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container"> 
<div id = "name">ACTIVE CONTAINERS</div><br/> 
<iframe> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "mail.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "subbtn" value = "EXECUTE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container"> 
<div id = "name">ALL CONTAINERS</div><br/> 
<iframe> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "mail.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "subbtn" value = "EXECUTE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "mail.php">
            <div id = "name"> STOP A CONTAINER</div><br/>
            <input class = "input" name = "name" type="text" placeholder="container name" value = "<?php echo $name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "STOP" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container"> 
<div id = "name">DOCKER NETWORK</div><br/> 
<iframe> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "mail.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "subbtn" value = "EXECUTE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "mail.php">
            <div id = "name">CREATE NETWORK</div><br/>
            <input class = "input" name = "name" type="text" placeholder="network name" value = "<?php echo $name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "CREATE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "mail.php">
            <div id = "name">DELETE NETWORK</div><br/>
            <input class = "input" name = "name" type="text" placeholder="network name" value = "<?php echo $name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "DELETE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container"> 
<div id = "name">AVAILABLE IMAGES</div><br/> 
<iframe> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "mail.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "subbtn" value = "EXECUTE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "mail.php">
            <div id = "name">DELETE IMAGE</div><br/>
            <input class = "input" name = "name" type="text" placeholder="image name" value = "<?php echo $name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "DELETE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

</div>
</body>
</html>