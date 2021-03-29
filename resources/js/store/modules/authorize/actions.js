export async function ACTION_TEST({ dispatch, commit, state }, payload) {
    await window.axios.get('/api/categories').then((response) => {
        window.console.log('window.axios', response);
    }).catch((err) => {
        
    });
}

export async function jwtLogin({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.post('/api/admin/auth/login', payload).then((response) => {
            commit('setAccessToken', response.data);
            commit('setAuthData', response.data);
            resolve(true);
        }).catch((err) => { 
            reject(false); 
        });
    });
}

export async function jwtLogout({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.post('/api/admin/auth/logout').then((response) => {
            commit('clearAccessToken');
            commit('clearAuthData');
            resolve(true);
        }).catch((err) => {
            reject(false);
        });
    });
}