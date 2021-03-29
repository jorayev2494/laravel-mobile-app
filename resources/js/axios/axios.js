import Axios from 'axios';
import store from '../store/store.js';

// Add a request interceptor
Axios.interceptors.request.use(
    (config) => {
        const accessToken = store.getters['authorize/getAccessToken'];
        if (accessToken) {
            config.headers['Authorization'] = 'Bearer ' + accessToken;
        }
        config.headers['Content-Type'] = 'application/json';
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

//Add a response interceptor
Axios.interceptors.response.use(
    (response) => {
        window.console.log('Response: ', response.config.url, response);
        return response
    },
    (error) => {
        window.console.log('Error response: ', error.response.config.url, error.response);

        // Error Unauthorized
        if (error.response.status == 401 && error.response.statusText == 'Unauthorized') {
            store.commit('authorize/clearAccessToken');
            store.commit('authorize/clearAuthData');
        }

    // const originalRequest = error.config;
 
    // if (error.response.status === 401 && originalRequest.url === 'http://13.232.130.60:8081/v1/auth/token') {
        // router.push('/login');
        // return Promise.reject(error);
    // }
 
    // if (error.response.status === 401 && !originalRequest._retry) { 
    //     originalRequest._retry = true;
    //     const refreshToken = localStorageService.getRefreshToken();
    //     return axios.post('/auth/token', { "refresh_token": refreshToken }).then(res => {
    //         if (res.status === 201) {
    //             localStorageService.setToken(res.data);
    //             axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorageService.getAccessToken();
    //             return axios(originalRequest);
    //         }
    //     })
    // }
    return Promise.reject(error);
 });

export default Axios;