<?php 
session_start();
$user = "yobah";
$url = $_SESSION["api_url"]."/cgi-bin/";
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
    <script src="https://kit.fontawesome.com/83d4dedb1b.js" crossorigin="anonymous"></script>
    <title>API Provider</title>
</head>
<body onload = "loader(); commandPrompt(); menuSessionChecker();">
    <div id="main-container">
        <div id="topnav">
            <ul>
                <li id = "typing" onclick = "commandPrompt()"><i class = "fa fa-keyboard-o" style="font-size: small;"></i> TYPING</li>
                <li><i class = "fa fa-microphone" style="font-size: small;"></i> VOICE</li>
                <li id = "menu" onclick = 'sideBar("sidepanel")'>KUBERNETES</li>
                <li onclick = 'window.open("docker.php", "_SELF")'><i class="fab fa-docker" style = "font-size: small"></i></i> DOCKER</li>
                <li onclick = 'window.open("mail.php", "_SELF")'><i class="far fa-paper-plane" style="font-size: small;"></i> MAIL</li>
                <li><i class="fab fa-aws" style = "font-size: small;"></i> AWS</li>
                <li><i class="fas fa-file" style = "font-size: small;"></i> DOCUMENTS</li>
                <li><i class="fas fa-info" style = "font-size: small;"></i> SERVER INFO</li>
                
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
        
        <div class = "sp" id="sidepanel">
            <ul>
                <li onclick = 'commandExecutor("minikube ip")'>K8S SERVER IP</li>
                <li onclick = 'commandExecutor("kubectl get pods")'>GET PODS</li>
                <li onclick = 'commandExecutor("kubectl get deploy")'>GET DEPLOY</li>
                <li onclick = 'commandExecutor("kubectl get svc")'>GET SVC</li>
                <li onclick = 'commandExecutor("kubectl get nodes")'>GET NODES</li>
                <li onclick = 'commandExecutor("kubectl get pvc")'>GET PVC</li>
                <li onclick = 'commandExecutor("kubectl get pv")'>GET PV</li>
                <li onclick = 'commandExecutor("kubectl get sc")'>GET SC</li>
                <li onclick = 'commandExecutor("kubectl describe pods")'>DESC PODS</li>
                <li onclick = 'commandExecutor("kubectl describe svc")'>DESC SVC</li>
                <li onclick = 'commandExecutor("kubectl describe nodes")'>DESC NODES</li> 
                <li onclick = 'commandExecutor("kubectl describe nodes")'>KUBECTL CV</li>              
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
            <form action="main.php" method = "POST">
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