/**
 * Created by dell on 2017/4/7.
 */

function checkOrganizationName() {
    var inputs=document.getElementsByName("organization_name")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "组织名称不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkBuildDate() {
    var inputs=document.getElementsByName("build_date")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "成立时间不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkNum() {
    var inputs=document.getElementsByName("num")[0].value;
    var pattern = new RegExp("^[0-9]*[1-9][0-9]*$");
    if(isEmpty(inputs)===false){
        swal({
            title: "注册志愿者人数不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
    if(pattern.test(inputs)==false){
        swal({
            title: "注册志愿者人数必须为正整数",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText1() {
    var inputs=document.getElementsByName("text1")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "主要服务内容不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText2() {
    var inputs=document.getElementsByName("text2")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "获奖情况不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText3() {
    var inputs = document.getElementsByName("text3")[0].value;
    if (isEmpty(inputs) === false) {
        swal({
            title: "主要事迹不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText4() {
    var inputs = document.getElementsByName("text4")[0].value;
    if (isEmpty(inputs) === false) {
        swal({
            title: "学院团委意见不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}

/*事件绑定*/
document.getElementsByName("organization_name")[0].onblur=function () {
    checkOrganizationName();
}
document.getElementsByName("build_date")[0].onblur=function () {
    checkBuildDate();
}
document.getElementsByName("num")[0].onblur=function () {
    checkNum();
}

document.getElementsByName("text1")[0].onblur=function () {
    checkText1();
}

document.getElementsByName("text2")[0].onblur=function () {
    checkText2();
}
document.getElementsByName("text3")[0].onblur=function () {
    checkText3();
}
document.getElementsByName("text4")[0].onblur=function () {
    checkText4();
}
