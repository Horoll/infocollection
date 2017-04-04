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


/*表单选择器*/
//获取表单元素
var forms=new Array();
function getForms() {
    var divs=document.getElementById("formSelect").querySelectorAll("div");
    for(var i=0;i<divs.length;i++){
        forms.push(divs[i]);
    }
}
getForms();
//设定初始状态
forms[0].style.display="block";
forms[1].style.display="none";
forms[2].style.display="none";
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
            break;
        case '2':
            forms[1].style.display="block";
            forms[0].style.display="none";
            forms[2].style.display="none";
            break;
        case'3':
            forms[2].style.display="block";
            forms[1].style.display="none";
            forms[0].style.display="none";
            break;
    }

};

/*对前三个表单的非空检查*/
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
    }
    else {
        return true;
    }
};


/*对publish按钮的绑定*/
document.getElementById("publish").onclick=function(){

    var form=document.getElementById("form");
    if(checkInput()==true){
        form.submit();
    }
}



