<?php
$api = "";
$status = "Connect";
session_start();
if(isset($_POST["subbtn"])){
    $api = $_POST["url"];
    $_SESSION["api_url"] = $api;

    echo file_get_contents($api."/cgi-bin/connection_test.py");
    $status = "Connected";
    header("Location: main.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="css/home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Linker</title>
</head>
<body>

<div id = "logos">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img height = "250" src = "images/docker.png"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img height = "150" src = "images/aws.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img height = "200" src = "images/redhat.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img height = "200" src = "images/kubernetes.png">
</div>
<div id = "mailsender">       
<div id = "item">
        <form method="POST" action = "index.php">
            <input class = "input" name = "url" type="url" placeholder="Enter your API url here!" value = "<?php echo $api ?>" required autofocus/> <br>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = '<?php echo $status ?>' title = "Establish connection to api"/>
        </form>

</div>
</div>

</body>
</html>