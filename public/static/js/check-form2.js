/**
 * Created by RaHsu on 2017/4/7.
 */
function checkProjectName() {
    var inputs=document.getElementsByName("project_name")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "项目名称不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}

function checkProjectType() {
    var inputs=document.getElementsByName("project_type")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "项目类型不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}

function checkUnit() {
    var inputs=document.getElementsByName("unit")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "申报单位不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkContacts() {
    var inputs=document.getElementsByName("contacts")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "联系人不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkContactTel() {
    var inputs=document.getElementsByName("contact_tel")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "联系电话不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText1() {
    var inputs=document.getElementsByName("text1")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "项目简介不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}
function checkText2() {
    var inputs=document.getElementsByName("text2")[0].value;
    if(isEmpty(inputs)===false){
        swal({
            title: "院团委意见不能为空",
            type: "error",
            confirmButtonText: "知道了",
        });
    }
}

/*事件绑定*/
document.getElementsByName("project_name")[0].onblur=function () {
    checkProjectName();
};
document.getElementsByName("project_type")[0].onblur=function () {
    checkProjectType();
};
document.getElementsByName("unit")[0].onblur=function () {
    checkUnit();
};

document.getElementsByName("contacts")[0].onblur=function () {
    checkContacts();
};
document.getElementsByName("contact_tel")[0].onblur=function () {
    checkContactTel();
};
document.getElementsByName("text1")[0].onblur=function () {
    checkText1();
};
document.getElementsByName("text2")[0].onblur=function () {
    checkText2();
};




