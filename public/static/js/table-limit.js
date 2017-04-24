/**
 * Created by Horol on 2017/4/24.
 */
var trs=document.querySelector('table').querySelectorAll("tr");
for(var i=0;i<trs.length;i++){
    var tds=trs[i].querySelectorAll('td');
    console.log(tds);
    for(var j=0;j<tds.length-1;j++){
        if(tds[j].innerHTML.length>100) {
            tds[j].innerHTML = tds[j].innerHTML.substring(0, 100) + '...';
        }
    }
}