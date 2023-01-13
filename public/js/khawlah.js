let selectMenu=document.querySelector("#status");
let container=document.querySelector(".list-of-company");


selectMenu.addEventListiner("change",function()
{
let statusName=this.value;
let http =new XMLHttpRequest();
http.onload=function(){
   if (this.readyState==4 && this.status==200){
    let response =JASON.parse(this.responseText);
    for(let item of response){

    }
   }
}
http.open('POST',"khawlah.php");
http.setRequestHeader("content-type","application/x-www-from-urlencoded");
http.send("status="+statusName);

}
)