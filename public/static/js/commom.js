/**
 * Created by RaHsu on 2017/3/31.
 */

/*非法字符检查*/
function isLegal(string){
    var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！ @#￥……&*（）——|{}【】‘；：”“'。，、？]");
    if(pattern.test(string)===true){
        return false;
    }
    else {
        return true;
    }
}

/*非空检查*/
function isEmpty(string) {
    if(string===""){
        return false;
    }
    else{
        return true;
    }
}