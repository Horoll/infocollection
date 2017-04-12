/**
 * Created by dell on 2017/4/10.
 */
var browser=navigator.appName;
var b_version=navigator.appVersion;
var version=b_version.split(";");
var trim_Version=version[1].replace(/[ ]/g,"");
if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0")
{
   console.log(document.getElementsByClassName("jumbotron")[0]);
   document.getElementsByClassName("jumbotron")[0].style.backgroundColor="#30a5ff";

}