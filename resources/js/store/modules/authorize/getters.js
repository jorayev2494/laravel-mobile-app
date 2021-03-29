export function GET_TEST(state) {
    return state.test;
}

export function getAccessToken(state) {
    return window.localStorage.getItem(state.admin.accessToken);
}

export function getAuthData(state) {
    let authData = window.localStorage.getItem(state.admin.authData);
    return authData ? JSON.parse(authData) : null;
}