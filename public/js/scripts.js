

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
function thisFileUploadReport() {
    document.getElementById("report").click();

}
function thisFileUploadTrainingSurvey() {
    document.getElementById("Training-Survey").click();

}
function thisFileUploadPresentation() {
    document.getElementById("Presentation").click();

}
function thisFileUploadEffectiveDateNotice() {
    document.getElementById("EffectiveDateNotice").click();

}
const form = document.querySelector(".form1"),
fileInput=document.querySelector(".PTuploadedfile"),
prograssArea=document.querySelector(".prograss-area"),
uploadedArea=document.querySelector(".upload-area");
if(form) {
    form.addEventListener("click", ()=>{
        fileInput.click();
    });
}

