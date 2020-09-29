<?php
session_start();
$sender = "";
$msg = "";
$receiver = "";
$pass = "Yredhat11111";
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
    <link type="text/css" rel="stylesheet" href="css/mailstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Sender</title>
</head>
<body>
<div id = "home"><a href = 'main.php'><i class='fas fa-home' style = 'font-size: xx-large'></i> HOME</a></div>
<div id = "mailsender">

<div id = "item">
        <form method="POST" action = "mail.php">
        <div id = "status">MSG STATUS: <?php echo $status ?></div>
            <input class = "input" name = "sender" type="email" placeholder="source mail" value = "<?php echo $sender?>" required/> <br>
            <div>.</div><br/>
            <input class = "input" name = "pass" type="password" placeholder="password" value = "<?php echo $pass?>" required/> <br>
            <div>.</div><br/>
            <input class = "input" name = "receiver" type="email" placeholder="destination mail" value = "<?php echo $receiver ?>" required/> <br>
            <div>.</div><br/>
            <textarea name="msg" cols="60" rows="10" value = "<?php echo $msg ?>" placeholder = "Type your message here..." required></textarea>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "Send" >
        </form>

</div>
</div>
</div>
</body>
</html>