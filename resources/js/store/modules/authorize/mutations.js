export function SET_TEST(state, payload) {
    state.test = payload;
};

export function setAccessToken(state, payload) {
    window.localStorage.setItem(state.admin.accessToken, payload.access_token);
}

export function setAuthData(state, payload) {
    let authDataStr = JSON.stringify(payload.auth_data);
    window.localStorage.setItem(state.admin.authData, authDataStr);
}

export function clearAccessToken(state, payload) {
    window.localStorage.removeItem(state.admin.accessToken);
}

export function clearAuthData(state, payload) {
    window.localStorage.removeItem(state.admin.authData);
}