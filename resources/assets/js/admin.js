// window.$ = require('jquery');

var $ = layui.jquery;
var layer = layui.layer;
$('.layui-nav .layui-nav-child dd').click(function () {
    addTab($(this).text(), $(this).data('url'), $(this).attr('id'));
});
function addTab(tabTitle,tabUrl,tabId){
    if ($(".layui-tab-title li[lay-id=" + tabId + "]").length > 0) {
        layui.element.tabChange('tab-switch', tabId);
    }else{
        layui.element.tabAdd('tab-switch', {
            title: tabTitle,
            content: '<iframe src='+tabUrl+' width="100%" style="min-height: 500px;" frameborder="0" scrolling="auto"></iframe>',
            id: tabId
        });
        layui.element.tabChange('tab-switch', tabId);
    }
}