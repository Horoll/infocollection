/**
 * Created by RaHsu on 2017/4/7.
 */

/*添加一行的函数*/
function addItem() {
    //检查一共有几列
    var moban=document.getElementById("biaotou");
    var count=0;
    for(var i=0;i<moban.childNodes.length;i++){
        if(moban.childNodes[i].nodeType=="1"){
            count++;
        }
    }
    //创建节点
    var item=document.createElement("tr");
    item.setAttribute("class","item");
    for(var j=0;j<1;j++){
        var td=document.createElement("td");
        var input=document.createElement("button");
        input.setAttribute("class","btn btn-danger");
        input.innerText="删除本行";
        td.appendChild(input);
        item.appendChild(td);
    }
    for(j=1;j<count;j++){
        var td=document.createElement("td");
        var input=document.createElement("input");
        input.setAttribute("type","text");
        input.setAttribute("class","form-control");
        td.appendChild(input);
        item.appendChild(td);
    }
    return item;

}

/*给所有删除按钮绑定删除功能的函数*/
function deleteItem() {
    var deleteButton=document.querySelectorAll(".btn-danger");
    for(var m=0;m<deleteButton.length;m++){
        deleteButton[m].onclick=function () {
            var table=this.parentNode.parentNode.parentNode;
            var thisItem=this.parentNode.parentNode;
            table.removeChild(thisItem);
        }
    }

}
deleteItem();


/*给添加一列的按钮添加事件*/
document.getElementById("add").onclick=function () {
    var table=document.getElementById("table").childNodes[1].childNodes[1];
    table.appendChild(addItem());
    deleteItem()
}

/*检查是否有空的表单*/
function checkinput() {
    var items=document.querySelectorAll(".item");
    for(var i=0;i<items.length;i++){
        var inputs=items[i].querySelectorAll("input");
        for(var j=0;j<inputs.length;j++){
            if(isEmpty(inputs[i].value)==false){
                return false;
            }
        }
    }
    return true;
}

/*获取数据及发送*/
function sendData(posturl,successurl) {
    var task_id=document.getElementsByName("task_id")[0].value;
    var data={};
    data.task_id=task_id;
    var items=document.querySelectorAll(".item");
    for(var i=0;i<items.length;i++){
        var inputs=items[i].querySelectorAll("input");
        var myObj={};
        for(var j=0;j<inputs.length;j++){
            if(inputs[j].name === 'id'){
                myObj['id'] = inputs[j].value;
                continue;
            }
            myObj[j]=inputs[j].value;
        }
        data[i]=myObj;
    }

    var dataJson=JSON.stringify(data);
    console.log(dataJson);
    var jsonhttp=new XMLHttpRequest();
    jsonhttp.open("POST",posturl,true);
    jsonhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    jsonhttp.onreadystatechange=function(){
        if(jsonhttp.readyState==4||jsonhttp.readyState==200){
            if(jsonhttp.responseText=='1'){
                swal({
                    title: "发布成功",
                    type: "success",
                    confirmButtonText: "确定",
                    confirmButtonColor: "#ec6c62"
                },function () {
                    window.location.href=successurl;
                });
            }
            else {
                swal({
                    title: jsonhttp.responseText,
                    type: "error",
                    confirmButtonText: "确定",
                    confirmButtonColor: "#ec6c62"
                });
            }
        }
    };
    jsonhttp.send(dataJson);
}
