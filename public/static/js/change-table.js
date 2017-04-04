/**
 * Created by RaHsu on 2017/4/4.
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

/*对前所有表单的非空检查*/
function checkInput() {
    var items=document.getElementById("userDefine").querySelectorAll("input");

    function checkItems() {
        for(var i=0;i<items.length;i++){
            if(items[i].value==""){
                return false;
            }
        }
        return true;
    }
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
    }
    else if(checkItems()==false){
        swal({
            title: "项目名称不能为空",
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

function getData(posturl,successurl) {
    //获取元素的值
    var id=document.getElementsByName("id")[0].value;
    var name=document.getElementsByName("taskname")[0].value;
    var startTime=document.getElementsByName("start_date")[0].value;
    var endTime=document.getElementsByName("end_date")[0].value;
    var taskText=document.getElementsByName("tasktext")[0].value;
    var data=document.getElementsByClassName("item");

    var dataObj={};
    var taskname;
    for(var i=0;i<data.length;i++){
        taskname="task"+i;
        dataObj[taskname]=data[i].value;
    }

    var info={};
    info.id=id;
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
                    title: "修改成功",
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

