/**
 * Created by dell on 2017/4/3.
 */
/**
 * Created by RaHsu on 2017/4/1.
 */

/*时间选择器设置*/
$('.timePicker').datetimepicker({
    format:"yyyy-mm-dd",
    minView:'month',
    autoclose: true,
    todayBtn: true,
    pickerPosition: "bottom-left",
    language: 'zh-CN',
});

/*表单显示设置*/

/*绑定删除按钮，删除本行*/
function deleteItem(){
    var deleteButton=document.getElementsByClassName("remove");
    for(var i=0;i<deleteButton.length;i++){
        deleteButton[i].onclick=function () {
            var parent=this.parentNode.parentNode.parentNode;
            parent.removeChild(this.parentNode.parentNode);
        }
    }
};
deleteItem();


/*绑定添加按钮，添加一行*/
var addButton=document.getElementById("add");


function add() {

    var addItem=document.createElement("tr");
    addItem.className="item";
    var td1=document.createElement("td");
    var input=document.createElement("input");
    input.type="text";
    input.className="form-control";
    td1.appendChild(input);
    var td2=document.createElement("td");
    var button=document.createElement("button");
    button.className="btn btn-danger remove";
    button.type="button";
    button.innerHTML="<span class='glyphicon glyphicon-trash'></span>&nbsp;删除本行";
    td2.appendChild(button);
    addItem.appendChild(td1);
    addItem.appendChild(td2);
    var table=addButton.previousSibling.previousSibling.childNodes[1];
    table.appendChild(addItem);
}


addButton.onclick=function () {
    add();
    deleteItem();
}



/*获取自定义表单数据转化为json*/
function getData(posturl,successurl) {
    //获取元素的值
    var name=document.getElementsByName("taskname")[0].value;
    var startTime=document.getElementsByName("start_date")[0].value;
    var endTime=document.getElementsByName("end_date")[0].value;
    var taskText=document.getElementsByName("tasktext")[0].value;
    var data=document.getElementsByClassName("item");

    var dataObj={};
    var taskname;
    for(var i=0;i<data.length;i++){
        taskname="task"+i;
        dataObj[taskname]=data[i].childNodes[1].childNodes[1].value;
    }

    var info={};
    info.taskname=name;
    info.tasktext=taskText;
    info.start_date=startTime;
    info.end_date=endTime;
    info.table_moudle=dataObj;


    var dataJson=JSON.stringify(info);
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
};

/*对自定义表单的非空检查*/
function checkItem() {
    var items=document.getElementsByClassName("item");

    for (var i=0;i<items.length;i++){
        if(isEmpty(items[i].childNodes[1].childNodes[1].value)==false){
            return false;
        }
    }
    return true;
}

/*非空检查*/
function checkInput() {
    if(isEmpty(document.getElementsByName("taskname")[0].value)==false){
        swal({
            title: "任务名称不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    }
    else if(isEmpty(document.getElementsByName("start_date")[0].value)==false){
        swal({
            title: "开始时间不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    }
    else if(isEmpty(document.getElementsByName("end_date")[0].value)==false){
        swal({
            title: "结束时间不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    } else if(checkItem()==false){
        swal({
            title: "自定义项目不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    }
    else {
        return true;
    }
};




