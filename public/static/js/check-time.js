/**
 * Created by RaHsu on 2017/4/7.
 */
var wells=document.getElementsByClassName("well");
for(var i=0;i<wells.length;i++){
    var time=wells[i].querySelectorAll(".time");
    var now=new Date();
    var year=now.getFullYear();
    var month=now.getMonth()+1;
    var day=now.getDate();
    if(month<10){
        month='0'+month;
    }
    if(day<10){
        day='0'+day;
    }
    now=year+'-'+month+'-'+day;

    if(time[0].innerText>now||time[1].innerText<now){
        wells[i].querySelectorAll(".submit")[0].setAttribute('class',"btn btn-danger disabled submit");
        wells[i].querySelectorAll(".submit")[0].innerHTML="<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;现在不能提交";
    }
}