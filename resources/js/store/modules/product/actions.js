/**
 * Load Products
 * @param {*} param0 
 * @param {*} payload void
 */
export async function loadProducts({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get(`/api/admin/managements/products`).then((response) => { // ?current_page=${payload.currentPage}&per_page=${payload.perPage}
            commit('setProducts', response.data);
            resolve(state.products);
        }).catch((err) => {
            reject(false);
        });
    });
}

/**
 * Get Product
 * @param {*} param0 
 * @param {*} payload Product id
 */
export async function getProduct({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get(`/api/admin/managements/products/${payload}`).then((response) => {
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        })
    })
}

export async function createProduct({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
    const config = {
        headers: { 'content-type': 'multipart/form-data' }
    };
    window.axios.post('/api/admin/managements/products', payload, config).then((response) => {   // _method: 'PUT'
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        });
    })
}

export async function updateProduct({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
    const config = {
        headers: { 'content-type': 'multipart/form-data' }
    };
    // payload.data._method = 'PUT';
    // console.log('payload.data: ', payload.data, payload.data._method);
    window.axios.post(`/api/admin/managements/products/${payload.id}`, payload.data, config).then((response) => {   // _method: 'PUT'
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        });
    })
}

/**
 * Delete Product
 * @param {*} param0 
 * @param {*} payload Product
 */
export async function deleteProduct({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        let confirmed = window.confirm(`Вы действительно хотите удалить продукт \r\n '${payload.title}' ?`);
        if (confirmed) {
            window.axios.delete(`/api/admin/managements/products/${payload.id}`).then((response) => {
                resolve(response.status == 204 && response.statusText == "No Content");
            }).catch((err) => {
                reject(false);
            });
        } else {
            resolve(false);
        }
    });
}