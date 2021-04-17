export async function getCarts({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get('/api/admin/managements/carts').then((response) => {
            commit('setCarts', response.data);
            resolve(state.carts);
        }).catch((err) => {
            reject(false);
        });
    });
}

export async function getCart({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get(`/api/admin/managements/carts/${payload}`).then((response) => {
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        });
    })
}

export async function changeStatus({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.put(`/api/admin/managements/carts/${payload.id}/change_status`, { status: payload.data }).then((response) => {
            resolve(response.data);
        }).catch((err) => { })
    })
}