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

    var addItem=document.getElementsByClassName("item")[0].cloneNode(true);
    addItem.childNodes[1].childNodes[1].value="";
    var table=addButton.previousSibling.previousSibling.childNodes[1];
    table.appendChild(addItem);
}


addButton.onclick=function () {
    add();
    deleteItem();
}

/*表单选择器*/
//获取表单元素
var forms=new Array();
function getForms() {
    var divs=document.getElementById("formSelect").querySelectorAll("div");
    for(var i=0;i<divs.length;i++){
        forms.push(divs[i]);
    }
    console.log(forms);

}
getForms();
//设定初始状态
forms[0].style.display="block";
forms[1].style.display="none";
forms[2].style.display="none";
forms[3].style.display="none";
var chioce=document.getElementById("formType").value;

//绑定选择器
document.getElementById("formType").onchange=function () {
    var chioce=document.getElementById("formType").value;

    switch (chioce){
        case '1':
            console.log(chioce);
            forms[0].style.display="block";
            forms[1].style.display="none";
            forms[2].style.display="none";
            forms[3].style.display="none";
            break;
        case '2':
            forms[1].style.display="block";
            forms[0].style.display="none";
            forms[2].style.display="none";
            forms[3].style.display="none";
            break;
        case'3':
            forms[2].style.display="block";
            forms[1].style.display="none";
            forms[0].style.display="none";
            forms[3].style.display="none";
            break;
        case '4':
            forms[3].style.display="block";
            forms[1].style.display="none";
            forms[2].style.display="none";
            forms[0].style.display="none";
            break;
    }

}

/*获取数据转化为json*/
function getData() {
    var data=document.getElementsByClassName("item");
    var dataArray=new Array();
    for(var i=0;i<data.length;i++){
        dataArray.push(data[i].childNodes[1].childNodes[1].value);
    }
    var dataJson=JSON.stringify(dataArray);
    var jsonhttp=new XMLHttpRequest();
    jsonhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    jsonhttp.onreadystatechange=function(){
        if(jsonhttp.readyState==4||jsonhttp.readyState==200){


        }
    }
    jsonhttp.open("POST",url,true);
    jsonhttp.send();

};

/*对前三个表单的非空检查*/
function checkInput() {
    if(isEmpty(document.getElementsByName("name")[0].value)==false){
        swal({
            title: "任务名称不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    }
    else if(isEmpty(document.getElementsByName("startTime")[0].value)==false){
        swal({
            title: "开始时间不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    }
    else if(isEmpty(document.getElementsByName("endTime")[0].value)==false){
        swal({
            title: "结束时间不能为空",
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


/*对publish按钮的绑定*/
document.getElementById("publish").onclick=function(){

    var chioce=document.getElementById("formType").value;
    var detail=document.getElementById("detail");
    var formType=document.getElementById("form");
    console.log((chioce=='1'||chioce=="2"||chioce=='3')&&checkInput());
    if((chioce=='1'||chioce=="2"||chioce=='3')&&checkInput()==true){
        detail.submit();
        formType.submit();
    }
    else if(chioce=='4'&&checkInput()==true){
        detail.submit();
        getData();
    }
}




