/**
 * Created by dell on 2017/4/10.
 */
var browser=navigator.appName
var b_version=navigator.appVersion
var version=b_version.split(";");
var trim_Version=version[1].replace(/[ ]/g,"");
if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0")
{
    var success=document.getElementsByClassName("btn-success");
    for(var i=0;i<success.length;i++){
        success[i].style.marginBottom="25px";
        success[i].style.marginLeft="15px";
    }
    var danger=document.getElementsByClassName("btn-danger");
    for(var i=0;i<danger.length;i++){
        danger[i].style.marginBottom="25px";
    }
    var td=document.querySelectorAll("td");
    for(var i=0;i<td.length;i++){
        td[i].style.paddingRight="20px";
    }
    var info=document.getElementsByClassName("btn-info")[0];
    info.style.marginTop="45px";

}