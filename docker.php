<?php
session_start();
$version = "latest";
$contPort = "";
$exPort = "";
$cont_name = "";
$cont_image = "";
$response = "";
$status = "";
$mail_api = "";
$command = "";
$del = "%20";
$src = "";

if(isset($_POST["active_cont"])){
    $src = $_SESSION["api_url"]."/cgi-bin/?cmd=sudo docker ps";
}

if(isset($_POST["all_cont"])){
    $src = $_SESSION["api_url"]."/cgi-bin/?cmd=sudo docker ps -a";
}

if(isset($_POST["subbtn"])){
    $exPort = $_POST["ex_port"];
    $version = $_POST["version"];
    $cont_image = $_POST["cont_image"];
    $cont_name = $_POST["cont_name"];
    $contPort = $_POST["cont_port"];

    $command = "sudo".$del."docker".$del."run".$del."-dit".$del."--name".$del.$cont_name.$del."-p".$del."$contPort:$exPort".$del."$cont_image:$version";
    //echo $command;
    $mail_api = $_SESSION["api_url"]."/cgi-bin/?cmd=".$command;
    $response = file_get_contents($mail_api);
    echo $response;
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
    <a href = "#images">IMAGES</a>
</div>
<div id = "docker">
<div id = container class = "container">    
    <div class = "item">    
        <form method="POST" action = "docker.php">
            <div id = "name"> LAUNCH A CONTAINER</div><br/>
            <input class = "input" name = "cont_name" type="text" placeholder="container name" value = "<?php echo $cont_name?>" required/><br/>
            <select name = "cont_image">
                <option>wordpress</option>
                <option>centos</option>
                <option>ubuntu</option>
                <option>redhat</option>
                <option>mysql</option>
        </select> <br/>            
            <input class = "input" name = "version" type="text" placeholder="image version" value = "<?php echo $version ?>" required/><br/>
            <input class = "input" name = "cont_port" type="number" placeholder="container port" value = "<?php echo $contPort ?>" required/><br/>
            <input class = "input" name = "ex_port" type="number" placeholder="expose port" value = "<?php echo $exPort ?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "Launch" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container"> 
<div id = "name">ACTIVE CONTAINERS</div><br/> 
<iframe src = "<?php echo $src ?>"> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "docker.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "active_cont" value = "SHOW" >
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
        <form method="POST" action = "docker.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "all_cont" value = "SHOW" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "docker.php">
            <div id = "name"> STOP A CONTAINER</div><br/>
            <input class = "input" name = "cont_name" type="text" placeholder="container name" value = "<?php echo $cont_name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "STOP" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div id = "network" class = "container"> 
<div id = "name">DOCKER NETWORK</div><br/> 
<iframe> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "docker.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "subbtn" value = "SHOW" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "docker.php">
            <div id = "name">CREATE NETWORK</div><br/>
            <input class = "input" name = "network_name" type="text" placeholder="network name" value = "<?php echo $network_name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "CREATE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "docker.php">
            <div id = "name">DELETE NETWORK</div><br/>
            <input class = "input" name = "network_name" type="text" placeholder="network name" value = "<?php echo $network_name?>" required/><br/>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "DELETE" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div id = "images" class = "container"> 
<div id = "name">AVAILABLE IMAGES</div><br/> 
<iframe> </iframe><br/>
    <div class = "item">        
        <form method="POST" action = "docker.php"><br/>
            <input style = "width: 100%" class = "input" id = "button" type="submit" name = "subbtn" value = "SHOW" >
        </form>
    <div>
</div>
</div>
</div>
<br/>

<div class = "container">    
    <div class = "item">    
        <form method="POST" action = "docker.php">
            <div id = "name">DELETE IMAGE</div><br/>
            <input class = "input" name = "img_name" type="text" placeholder="image name" value = "<?php echo $img_name?>" required/><br/>
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