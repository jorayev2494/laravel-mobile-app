import Vuex from 'vuex';


// #region Modules
import authorize from './modules/authorize/index.js';
import users from './modules/users/index.js';
import category from './modules/category/index.js';
import product from './modules/product/index.js';
// #endregion

const store = new Vuex.Store({
    modules: {
        authorize,
        users,
        category,
        product
    }
});

export default store;