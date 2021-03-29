import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes.js'
import store from '../store/store.js';

const router = createRouter({
    base: window.location.origin,
    history: createWebHistory(),
    routes
});

// let isAuthenticated = () => store.getters['authorize/getAccessToken'];
router.beforeEach((to, from, next) => {
    if (to.matched.some((route) => route.meta?.middleware?.includes('auth'))) {
        if (store.getters['authorize/getAccessToken']) {
            next(true);
        } else {
            next({ name: 'auth.login' });
        }
    } else {
        next(true);
    }
});

export default router;