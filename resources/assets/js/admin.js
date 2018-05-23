window.$ = require('jquery');

var element, layer;

layui.use('element', function(){
    element = layui.element;
    layer = layui.layer;

    //监听左侧菜单点击
    element.on('nav(left-menu)', function(elem){
        console.info(elem);
        addTab(elem[0].innerText,elem[0].attributes[1].nodeValue,elem[0].id);
    });
    //监听tab选项卡切换
    element.on('tab(tab-switch)', function(data){
        if(data.elem.context.attributes != undefined){
            var id = data.elem.context.attributes[0].nodeValue;
            layui.each($(".layui-nav-child"), function () {
                $(this).find("dd").removeClass("layui-this");
            });
            $("#"+id).attr("class","layui-this");
        }
    });

    function addTab(tabTitle,tabUrl,tabId){
        if ($(".layui-tab-title li[lay-id=" + tabId + "]").length > 0) {
            element.tabChange('tab-switch', tabId);
        }else{
            element.tabAdd('tab-switch', {
                title: tabTitle
                ,content: '<iframe src='+tabUrl+' width="100%" style="min-height: 500px;" frameborder="0" scrolling="auto" onload="setIframeHeight(this)"></iframe>' // 选项卡内容，支持传入html
                ,id: tabId //选项卡标题的lay-id属性值
            });
            element.tabChange('tab-switch', tabId); //切换到新增的tab上
        }
    }
    function setIframeHeight(iframe) {
        if (iframe) {
            var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
            if (iframeWin.document.body) {
                iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
            }
        }
    }
});
//
// //左侧导航根据一级菜单关闭其它一级菜单
// $('ul.layui-nav li').click(function() {
//     $('ul.layui-nav li').removeClass('layui-nav-itemed');
//     $(this).addClass('layui-nav-itemed');
// });