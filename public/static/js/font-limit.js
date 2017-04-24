/**
 * Created by RaHsu on 2017/4/23.
 */
var texts=document.querySelector('table').querySelectorAll("tr");
for(var i=1;i<texts.length;i++){
    var tds=texts[i].querySelectorAll('td');
        tds[1].innerHTML = tds[1].innerHTML.substring(0, 100) + '...';
}