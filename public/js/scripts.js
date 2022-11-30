

$(document).ready(function(){ 
   

               });
 function displaymenu(){
    if(document.getElementById("submenu-2").style.display=="block"){
        document.getElementById("submenu-2").style.display="none";
        document.getElementById("submenu-2").classList.remove("glyphicon-chevron-down");
        document.getElementById("submenu-2").classList.add("glyphicon-chevron-up");


    }else
    document.getElementById("submenu-2").style.display = "block";
    document.getElementById("submenu-2").classList.remove("glyphicon-chevron-up");
    document.getElementById("submenu-2").classList.add("glyphicon-chevron-down");
    }