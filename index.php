<?php 
$user = "yobah";
//$url = "https://2e896ca59b85.ngrok.io/cgi-bin/";
$url = "https://ee6b0ad75293.ngrok.io/cgi-bin/";
$cmd = "";

//gets system information of server
$sysInfoApi = $url . "system.py";
$system = file_get_contents($sysInfoApi);
if(isset($_POST["cmd"])){
    $cmd = $_POST["cmd"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/main_style.css"/>
    <script src = "js/design.js"></script>
    <title>API Provider</title>
</head>
<body onload = "loader(); commandPrompt(); menuSessionChecker();">
    <div id="main-container">
        <div id="topnav">
            <ul>
                <li id = "typing" onclick = "commandPrompt()">TYPING</li>
                <li>VOICE</li>
                <li id = "menu" onclick = 'sideBar()'>MENU</li>
                <li>HELP</li>
                <li>SYSTEM INFO</li>
                <li onclick = 'window.open("mail.php", "_blank")'>MAIL</li>
                <div style = "border: 1px solid  #e43f5a;
                              font-family: 'Courier New', Courier, monospace;
                              font-weight: bold;
                              font-size: large;
                              border-radius: 0.5em;
                              color: #121222;
                              box-shadow: 1px 3px 10px black;
                              background-color: #e43f5a;" 
                              id = "top-right">
                    OS: <?php echo $system ?>       
                </div>
            </ul>
        </div>
        
        <div id="sidepanel">
            <ul>
                <li onclick = 'commandExecutor("date");'>SYSTEM DATE</li>
                <li onclick = 'commandExecutor("ipconfig")'>IP ADDRESS</li>
                <li onclick = 'commandExecutor("dir")'>PRESENT DIR</li>
                <li onclick = 'commandExecutor("time")'>SERVER TIME</li>
                <li onclick = 'commandExecutor("date")'>5</li>
                <li onclick = 'commandExecutor("date")'>6</li>
                <li onclick = 'commandExecutor("date")'>7</li>
                <li>8</li>
                <li>9</li>
                <li>10</li>
                <li>11</li>
                <li>12</li>
                <li>13</li>
                
            </ul>
        </div>
    <div id = "commandline">
        <div id = "outputconsole">
            <iframe onload = 'document.getElementById("loader-wrapper").style.display = "none";' id = "console" style = "border-color: #e43f5a; 
                                            transition: 1s ease;" 
                                            src = '<?php echo $url . "?cmd=$cmd"; ?>'  
                                            height="542" width="100%">
            </iframe>
        </div>

        <div id="commandprompt">
            <form action="index.php" method = "POST">
                <input id = "cmd" autocomplete="off" 
                       type="text" name = "cmd" 
                       placeholder="ENTER YOUR COMMANDS HERE!!!" 
                       value = '<?php echo $cmd ?>'autofocus required/>
                <input onload = "loader()" id = "smtbtn" type= "submit" value = "EXECUTE">
            </form>
        </div>
     </div>

    </div>
    <div id = "loader-wrapper">
        <div id = "boxer">
        <div class = "loader">B.M.B</div>
        </div>
    </div>
</body>
</html>