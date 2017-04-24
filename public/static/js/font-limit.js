/**
 * Created by RaHsu on 2017/4/23.
 */
var texts=document.querySelector('table').querySelectorAll("tr");
console.log(texts);
for(var i=1;i<texts.length;i++){
    var tds=texts[i].querySelectorAll('td');
    if(tds[1].length>100) {
        tds[1].innerHTML = tds[1].innerHTML.substring(0, 100) + '...';
    }
}