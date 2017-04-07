/**
 * Created by RaHsu on 2017/4/7.
 */

function checkUnit() {
    var inputs=document.getElementsByName("unit")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "单位不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkSecretaryName() {
    var inputs=document.getElementsByName("secretary_name")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "书记姓名不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}

function checkNum1() {
    var inputs=document.getElementsByName("num1")[0].value;
    var pattern = new RegExp("^[0-9]*[1-9][0-9]*$");
    if(isEmpty(inputs)===false){
        swal({
            title: "团支部数不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
    if(pattern.test(inputs)==false){
        swal({
            title: "团支部数必须为正整数",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkNum2() {
    var inputs=document.getElementsByName("num2")[0].value;
    var pattern = new RegExp("^[0-9]*[1-9][0-9]*$");
    if(isEmpty(inputs)===false){
        swal({
            title: "团员总数不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
    if(pattern.test(inputs)==false){
        swal({
            title: "团员总数必须为正整数",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkNum3() {
    var inputs=document.getElementsByName("num3")[0].value;
    var pattern = new RegExp("^[0-9]*[1-9][0-9]*$");
    if(isEmpty(inputs)===false){
        swal({
            title: "年度推优入党人数不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
    if(pattern.test(inputs)==false){
        swal({
            title: "年度推优入党人数必须为正整数",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText1() {
    var inputs=document.getElementsByName("text1")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "获奖情况不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText2() {
    var inputs=document.getElementsByName("text2")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "一年来开展的主要工作、特色及成效不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText3() {
    var inputs=document.getElementsByName("text3")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "学院党委意见不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}

/*事件绑定*/
document.getElementsByName("unit")[0].onblur=function () {
    checkUnit();
};
console.log(document.getElementsByName("secretary_name")[0]);
document.getElementsByName("secretary_name")[0].onblur=function () {
    checkSecretaryName();
};
document.getElementsByName("num1")[0].onblur=function () {
    checkNum1();
};
document.getElementsByName("num2")[0].onblur=function () {
    checkNum2();
};
document.getElementsByName("num3")[0].onblur=function () {
    checkNum3();
};
document.getElementsByName("text1")[0].onblur=function () {
    checkText1();
};
document.getElementsByName("text2")[0].onblur=function () {
    checkText2();
};
document.getElementsByName("text3")[0].onblur=function () {
    checkText3();
};