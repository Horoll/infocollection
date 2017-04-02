/**
 * Created by RaHsu on 2017/4/1.
 */

/*删除确认*/
var comfirmDelete=document.querySelectorAll(".btn-danger");
for(var i=0;i<comfirmDelete.length;i++){
    console.log(comfirmDelete[i]);
    comfirmDelete[i].onclick=function () {
        var form=this.parentNode.parentNode.firstChild.nextSibling;
        swal({
            title: "确定要删除这个账号吗？",
            type: "warning",
            showCancelButton:true,
            confirmButtonText: "确定",
            cancelButtonText:'返回',
            confirmButtonColor: "#ffffff",
            closeOnConfirm: true,
            closeOnCancel: true
        },function(isConfirm){
            if(isConfirm){
                deleteaccount(form.getAttribute('id'));
            }
        });
    }
}

