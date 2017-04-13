/**
 * Created by RsHsu on 2017/4/13.
 */
var intros=document.getElementsByClassName("short-intro");
for(var i=0;i<intros.length;i++){
    if(intros[i].innerHTML.length>40){
        intros[i].innerHTML=intros[i].innerHTML.substring(0,40)+'....';
    }
}
