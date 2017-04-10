/**
 * Created by dell on 2017/3/31.
 */
(function () {
    var screenHeight=window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;//屏幕内容区域（不包括浏览器的菜单等）高度
    var sideBar=document.getElementById('sideBar');
    sideBar.style.height=(screenHeight-50)+"px";

})();


