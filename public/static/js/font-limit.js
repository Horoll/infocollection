/**
 * Created by RaHsu on 2017/4/23.
 */
var texts=document.querySelector('table').querySelectorAll("td");
for(var i=0;i<texts.length-1;i++){
    if(texts[i].innerHTML.length>100){
        texts[i].innerHTML=texts[i].innerHTML.substring(0,100)+'......';
    }
}