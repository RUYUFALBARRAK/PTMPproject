

$(document).ready(function(){ 
   

               });
 function displaymenu(){
    if(document.getElementById("submenu-2").style.display=="block"){
        document.getElementById("submenu-2").style.display="none";
        document.getElementById("submenu-2").classList.remove("glyphicon glyphicon-chevron-down");
        document.getElementById("submenu-2").classList.add("glyphicon glyphicon-chevron-up");


    }else
    document.getElementById("submenu-2").style.display = "block";
    document.getElementById("submenu-2").classList.remove("glyphicon glyphicon-chevron-up");
    document.getElementById("submenu-2").classList.add("glyphiconglyphicon-chevron-down");
    }
function openNav(){
    document.getElementsByTagName("nav")[0].style.display="block";
    document.getElementById("nav").style.display="none";
    document.getElementsByClassName("content-wrapper")[0].style.width="calc(100% - 20%)"; 
    document.getElementsByClassName("content-wrapper")[0].style.left="20%"; 
    
}

function closeNav(){
    document.getElementsByTagName("nav")[0].style.display="none";
    document.getElementById("nav").style.display="block";
    document.getElementsByClassName("content-wrapper")[0].style.width="100%"; 
    document.getElementsByClassName("content-wrapper")[0].style.left="0%"; 
}