import axios from 'axios';
import Qs from 'qs';
import NProgress from 'nprogress';

let http = axios.create({
    baseURL: '/',
    timeout: 30000,
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    transformRequest: [function (data) {
        data = data || {};
        data['api_token'] = localStorage.getItem('api_token');
        data = Qs.stringify(data);
        return data;
    }],

    transformResponse: [function (data) {
        try {
            data = JSON.parse(data);
        } catch (err) {}

        return data;
    }],
});

http.interceptors.request.use(
    (config) => {
        NProgress.start();
        if (config.method === 'get') {
            config.params = config.params ? config.params : {};
            config.params['api_token'] = localStorage.getItem('api_token');
        }

        return config;
    },
    (error) => {
        NProgress.error();
        return Promise.reject(error);
    }
);

http.interceptors.response.use(
    response => {
        NProgress.done();

        return response;
    },
    error => {
        console.error(error.msg);
        return Promise.reject(error);
    }
);

export default http;
