// window.$ = require('jquery');

var $ = layui.jquery;
var layer = layui.layer;
var element = layui.element;
$('.layout-menus .layui-nav-child dd,.layout-header-menus .layui-nav-item,.layout-header-menus dd').click(function () {
    if (!$(this).data('url')) {
        return ;
    }
    addTab($(this).text(), $(this).data('url'), $(this).attr('id'));
});
// 创建新标签页
function addTab(tabTitle,tabUrl,tabId){
    if ($(".layui-tab-title li[lay-id=" + tabId + "]").length > 0) {
        element.tabChange('tab-switch', tabId);
    }else{
        element.tabAdd('tab-switch', {
            title: tabTitle,
            content: '<iframe src='+tabUrl+' width="100%" style="min-height: 500px;" frameborder="0" scrolling="auto"></iframe>',
            id: tabId
        });
        element.tabChange('tab-switch', tabId);
    }
}