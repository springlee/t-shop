import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
const routers = [
    {
        path: '/',
        name: 'home_index',
        meta: {
            title: '首页'
        },
        component: resolve => require(['../views/home/index'], resolve)
    },
    {
        path: '/user',
        name: 'user_info',
        meta: {
            title: '用户信息'
        },
        component: resolve => require(['../views/user/user-info'], resolve)
    },
];

export default new Router({
  // mode: 'history',
  scrollBehavior: () => ({ y: 0 }),
  routes: routers
})
