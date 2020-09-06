
var isOnOfCmd = false;

sessionStorage.SessionName = "SessionData";
sessionStorage.setItem("isMenuOn", "false");

var url = "https://4dd9fb3c4848.ngrok.io/cgi-bin/";

function commandExecutor(command) {
    document.getElementById("loader-wrapper").style.display = "flex";
    document.getElementById("console").setAttribute("src", url+"?cmd="+command);
}
function loader(){
    document.getElementById("loader-wrapper").style.display = "none";
}


function sideBar(){
    if(sessionStorage.getItem("isMenuOn") == "true"){
        document.getElementById("smtbtn").style.width = null;
        document.getElementById("cmd").style.marginLeft = null;
        document.getElementById("cmd").style.width = null;
        document.getElementById("outputconsole").style.width = null;
        document.getElementById("sidepanel").style.width = "0px";
        document.getElementById("menu").style.backgroundColor = null;
        document.getElementById("menu").style.color = null;
        document.getElementById("menu").style.boxShadow = null;
        sessionStorage.setItem("isMenuOn", "false");
    }else{
        if(isOnOfCmd){
            document.getElementById("smtbtn").style.width = "16%";
            document.getElementById("cmd").style.width = "60%";
            document.getElementById("cmd").style.marginLeft = "1.5%"; 
        }else{
            document.getElementById("smtbtn").style.width = null;
            document.getElementById("cmd").style.marginLeft = null;
            document.getElementById("cmd").style.width = null;
        }
        
        document.getElementById("outputconsole").style.width = "78%";
        document.getElementById("sidepanel").style.width = "20%";
        document.getElementById("menu").style.backgroundColor = "#e43f5a";
        document.getElementById("menu").style.color = "#121222";
        document.getElementById("menu").style.boxShadow = "1px 3px 10px black";
        sessionStorage.setItem("isMenuOn", "true");
    }
}
function displayCmd(value){
    document.getElementById("cmd").style.display = value;
    document.getElementById("smtbtn").style.display = value;
}

function commandPrompt(){
    if(isOnOfCmd){
        displayCmd(null);
        document.getElementById("smtbtn").style.width = "24%";
        document.getElementById("cmd").style.width = "73.5%";
        document.getElementById("cmd").style.marginLeft = "0";
        document.getElementById("cmd").style.height = "0";
        document.getElementById("smtbtn").style.height = "0";
        
        
        document.getElementById("cmd").style.backgroundColor = null;
        document.getElementById("cmd").style.color = null;
        document.getElementById("typing").style.backgroundColor = null;
        document.getElementById("typing").style.color = null;
        document.getElementById("typing").style.boxShadow = null;
        document.getElementById("console").style.height = null;
        
        isOnOfCmd = false;
    }else{
        if(sessionStorage.getItem("isMenuOn") == "true"){
            document.getElementById("smtbtn").style.width = "16%";
            document.getElementById("cmd").style.width = "60%";
            document.getElementById("cmd").style.marginLeft = "1.5%"; 
            displayCmd("block");
        }else{
            document.getElementById("smtbtn").style.width = null;
            document.getElementById("cmd").style.marginLeft = null;
            document.getElementById("cmd").style.width = null;
        }
        document.getElementById("cmd").style.height = "51px";
        document.getElementById("smtbtn").style.height = "57px";
        document.getElementById("typing").style.backgroundColor = "#e43f5a";
        document.getElementById("typing").style.color = "#121222";
        document.getElementById("console").style.height = "476px";
        document.getElementById("typing").style.boxShadow = "1px 3px 10px black";
        displayCmd("block");
        isOnOfCmd = true;
    }

}


function menuSessionChecker(){
if(sessionStorage.getItem("isMenuOn") == "true"){
    if(isOnOfCmd){
        document.getElementById("smtbtn").style.width = "16%";
        document.getElementById("cmd").style.width = "60%";
        document.getElementById("cmd").style.marginLeft = "1.5%"; 
    }else{
        document.getElementById("smtbtn").style.width = null;
        document.getElementById("cmd").style.marginLeft = null;
        document.getElementById("cmd").style.width = null;
    }
    
    document.getElementById("outputconsole").style.width = "78%";
    document.getElementById("sidepanel").style.width = "20%";
    document.getElementById("menu").style.backgroundColor = "#e43f5a";
    document.getElementById("menu").style.color = "#121222";
    document.getElementById("menu").style.boxShadow = "1px 3px 10px black";
    sessionStorage.setItem("isMenuOn", "true");
}
}