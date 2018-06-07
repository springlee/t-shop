import Vue from 'vue';
import router from './router';
import { Message } from 'element-ui';
import NProgress from 'nprogress'; // progress bar
import 'nprogress/nprogress.css';// progress bar style
import { title } from '../utils/index' // getToken from cookie


NProgress.configure({ showSpinner: false })// NProgress Configuration

router.beforeEach((to, from, next) => {
    NProgress.start(); // start progress bar
    title(to.meta.title);
    next();
})

router.afterEach(() => {
    NProgress.done() // finish progress bar
})

export default router
