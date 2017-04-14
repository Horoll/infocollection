/**
 * Created by RaHsu on 2017/3/31.
 */

/*按键绑定*/
var userLoginButton=document.getElementById("userloginbutton");
userLoginButton.addEventListener("click",checkUserLogin);
/*
userLoginButton.onclick=checkUserLogin();
*/

var adminLoginButton=document.getElementById("adminloginbutton");
adminLoginButton.addEventListener('click',checkAdminLogin);
/*
adminLoginButton.onclick=checkAdminLogin();
*/


/*输入检查*/
function checkUserLogin() {
    var form=document.getElementById("userloginform");
    var username=document.getElementById("userLoginUserName").value;
    var password=document.getElementById("userLoginPassword").value;
    if(isEmpty(username)===false||isEmpty(password)===false){
        swal({
           title: "密码和用户名不能为空",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });

        return false;
    }
    else if(isLegal(username)===false||isLegal(password)===false){
        swal({
            title: "密码或用户名中含有非法字符",
            type: "error",
            confirmButtonText: "知道了",
            confirmButtonColor: "#ec6c62"
        });
        return false;
    }
    else {
        form.submit();
    }
}

function checkAdminLogin() {
    var form=document.getElementById("adminloginform");
    var username=document.getElementById("adminLoginUserName").value;
    var password=document.getElementById("adminLoginPassword").value;
    if(isEmpty(username)===false||isEmpty(password)===false){

        return false;
    }
    else if(isLegal(username)===false||isLegal(password)===false){
        return false;
    }
    else {
        form.submit();
    }
}

/*回车登录*/
document.body.onkeydown=function () {
    if (event.keyCode==13) { //回车键的键值为13]
        if(document.getElementById("myTab").firstElementChild.className==="active"){
            document.getElementById("userloginbutton").click();
        }
        else {
            document.getElementById("adminloginbutton").click(); //调用登录按钮的登录事件
        }

    }
}


