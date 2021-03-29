export async function loadUsers({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.get('/api/admin/managements/users').then((response) => {
            commit('setUsers', response.data);
            resolve(state.users);
        }).catch((err) => {
            reject(false);
        });
    });
}

export async function toggleBlock({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        let data = { value: payload.is_blocked ? 'unblock' : 'block' };
        window.axios.put(`/api/admin/managements/users/block/${payload.id}`, data).then((response) => {
            resolve(response.data);
        }).catch((err) => {
            reject(false);
        });
    });
}

export async function deleteUser({ dispatch, commit, state }, payload) {
    return await new Promise((resolve, reject) => {
        window.axios.delete(`/api/admin/managements/users/${payload.id}`).then((response) => {
            resolve(true);
        }).catch((err) => {
            reject(false);
        });
    });
}