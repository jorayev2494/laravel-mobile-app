export async function loadCategories({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get('/api/admin/managements/categories').then((response) => {
            commit('setCategories', response.data);
            resolve(state.categories);
        }).catch((err) => {
            reject(false);
        });
    });
}

export async function getCategory({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get(`/api/admin/managements/categories/${payload}`).then((response) => {
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        });
    });
}

export async function createCategory({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.post(`/api/admin/managements/categories`, window.func.convertFormData(payload)).then((response) => {
            resolve(response.data);
        }).catch((err) => {
            reject(true);
        });
    });
}

export async function updateCategory({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.post(`/api/admin/managements/categories/${payload.id}`, window.func.convertFormData(payload, true)).then((response) => {
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        });
    });
}

export async function deleteCategory({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.delete(`/api/admin/managements/categories/${payload.id}`).then((response) => {
            resolve(true);
        }).catch((err) => {
            reject(false);
        });
    })
}