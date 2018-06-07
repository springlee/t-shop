export const router = [
    {
        path: '/',
        name: '首页',
        component: resolve => require(['../views/home/Index'], resolve)
    },
];
