<?php

$sender = "";
$msg = "";
$receiver = "";
$pass = "Yredhat11111";
$respnse = "";
$status = "send";
$mail_api = "";

if(isset($_POST["subbtn"])){
    $sender = $_POST["sender"];
    $msg = $_POST["msg"];
    $receiver = $_POST["receiver"];
    $pass = $_POST["pass"];
    $mail_api = "https://ee6b0ad75293.ngrok.io/cgi-bin/mail.py?sender=$sender&pass=$pass&receiver=$receiver&msg=$msg";
    $respnse = file_get_contents($mail_api);
    $status = $respnse;
    //header("Location: $mail_api");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="css/mailstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Sender</title>
</head>
<body>
<div id = "mailsender">

       
<div id = "item">
    
        <form method="POST" action = "mail.php">
            <input class = "input" name = "sender" type="email" placeholder="source mail" value = "<?php echo $sender?>" required/> <br>
            <input class = "input" name = "pass" type="password" placeholder="password" value = "<?php echo $pass?>" required/> <br>
            <input class = "input" name = "receiver" type="email" placeholder="destination mail" value = "<?php echo $receiver ?>" required/> <br>
            <textarea name="msg" cols="60" rows="10" value = "<?php echo $msg ?>" placeholder = "Type your message here..." required></textarea>
            <input  class = "input" id = "button" type="submit" name = "subbtn" value = "<?php echo $status ?>" >
        </form>

</div>
</div>
</body>
</html>