

$(document).ready(function(){


               });
 function displaymenu(){
    if(document.getElementById("submenu-2").style.display=="block"){
        document.getElementById("submenu-2").style.display="none";


    }else
    document.getElementById("submenu-2").style.display = "block";
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
function thisFileUploadReport(myFile) {
    if(document.getElementById("report").value == "")
    {
    document.getElementById("report").click();
    }else{
        var file = myFile.files[0]; 
        var filename = file.name;
        document.getElementById("reportName").innerHTML=filename;
        document.getElementsByClassName("Report")[0].innerHTML=" Submit ";
        document.getElementsByClassName("Report")[0].type="submit";
    }

}
function thisFileUploadTrainingSurvey(myFile) {
    if(document.getElementById("Training-Survey").value == "")
    {
    document.getElementById("Training-Survey").click();
    }else{
        document.getElementsByClassName("TrainingSurvey")[0].innerHTML=" Submit ";
        document.getElementsByClassName("TrainingSurvey")[0].type="submit";
        var file = myFile.files[0]; 
        var filename = file.name;
        document.getElementById("TrainingSurveyName").innerHTML=filename;
    }

}
function thisFileUploadPresentation(myFile) {
    if(document.getElementById("Presentation").value == "")
    {
    document.getElementById("Presentation").click();
    }else{
        document.getElementsByClassName("Presentation")[0].innerHTML=" Submit ";
        document.getElementsByClassName("Presentation")[0].type="submit";
        var file = myFile.files[0];  
        var filename = file.name;
        document.getElementById("PresentationName").innerHTML=filename;
    }
}
function thisFileUploadEffectiveDateNotice(myFile) {
    if(document.getElementById("EffectiveDateNotice").value == "")
    {
    document.getElementById("EffectiveDateNotice").click();
    }else{
        var file = myFile.files[0]; 
        var filename = file.name;
        document.getElementById("EffectiveDateNoticeName").innerHTML=filename;
        document.getElementsByClassName("EffectiveDateNotice")[0].innerHTML=" Submit ";
        document.getElementsByClassName("EffectiveDateNotice")[0].type="submit";
    }
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
//hover on nav
window.onload = () => {
    document.querySelectorAll('nav a').forEach(link => {
       
  if(link.href === window.location.href){
    link.setAttribute('class', 'active'); 
  }
});
}
// End hover on nav
// start
let filename = '';
        function resetInfo(show = false) {
            $('.detal .precent').css('display', (show ? 'block' : 'none'));
        }
        function updateFileInfo(filename, percentage) {
            $('.detal .name').text(filename);
            $('.detal .precent').text(percentage);
        }
        $(function () {
            $(document).ready(function () {
                $('[name=uploudedfile]').on('change', (ev) => {
                    resetInfo();
                    const files = ev.target.files;
                    console.log(files);
                    if(files) {
                        filename = files[0].name;
                        $('.prograss-area').css('display', 'block');
                        updateFileInfo(filename, '0%');
                    }
                });
            });
        });

//ends