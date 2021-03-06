window.Vue = require('vue');

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueRouter from 'vue-router';
import router from './router';
import http from './tools/http';
import App from './views/App';
import store from './store'

Vue.use(ElementUI);
Vue.use(VueRouter);

Vue.prototype.$http = http;

new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
