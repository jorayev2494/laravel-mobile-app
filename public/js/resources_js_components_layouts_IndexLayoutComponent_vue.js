(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_layouts_IndexLayoutComponent_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/FooterComponent.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/FooterComponent.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      authUserData: {}
    };
  },
  methods: {
    logout: function logout(event) {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _this.$store.dispatch('authorize/jwtLogout').then(function (result) {
                  if (result) _this.$router.push({
                    name: 'auth.login'
                  });
                })["catch"](function (err) {});

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    }
  },
  created: function created() {
    this.authUserData = this.$store.getters['authorize/getAuthData'];
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=script&lang=js":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=script&lang=js ***!
  \****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      sidebarLinks: [{
        name: 'dashboard',
        icon: 'icon-grid',
        title: 'Dasboard'
      }, {
        name: 'managements.users',
        icon: 'icon-head',
        title: 'Пользователи'
      }, {
        name: 'managements.categories',
        icon: 'icon-head',
        title: 'Категории'
      }, {
        name: 'managements.products',
        icon: 'icon-head',
        title: 'Продукты'
      }]
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    NavbarComponent: __webpack_require__(/*! ../includes/partials/NavbarComponent.vue */ "./resources/js/components/includes/partials/NavbarComponent.vue").default,
    SettingsPanelComponent: __webpack_require__(/*! ../includes/partials/SettingsPanelComponent.vue */ "./resources/js/components/includes/partials/SettingsPanelComponent.vue").default,
    SidebarComponent: __webpack_require__(/*! ../includes/partials/SidebarComponent.vue */ "./resources/js/components/includes/partials/SidebarComponent.vue").default,
    FooterComponent: __webpack_require__(/*! ../includes/partials/FooterComponent.vue */ "./resources/js/components/includes/partials/FooterComponent.vue").default
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)("data-v-00b4a00e");

var _hoisted_1 = {
  "class": "footer"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"d-sm-flex justify-content-center justify-content-sm-between\" data-v-00b4a00e><span class=\"text-muted text-center text-sm-left d-block d-sm-inline-block\" data-v-00b4a00e> Copyright © 2021. Premium <a href=\"https://www.bootstrapdash.com/\" target=\"_blank\" data-v-00b4a00e>Bootstrap admin template</a> from BootstrapDash. All rights reserved. </span><span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\" data-v-00b4a00e> Hand-crafted &amp; made with <i class=\"ti-heart text-danger ml-1\" data-v-00b4a00e></i></span></div>", 1);

(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)(null);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)("footer", _hoisted_1, [_hoisted_2]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)("data-v-c1f9c08e");

var _hoisted_1 = {
  "class": "navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"text-center navbar-brand-wrapper d-flex align-items-center justify-content-center\" data-v-c1f9c08e><a class=\"navbar-brand brand-logo mr-5\" href=\"index.html\" data-v-c1f9c08e><img src=\"/admin/images/logo.svg\" class=\"mr-2\" alt=\"logo\" data-v-c1f9c08e></a><a class=\"navbar-brand brand-logo-mini\" href=\"index.html\" data-v-c1f9c08e><img src=\"/admin/images/logo-mini.svg\" alt=\"logo\" data-v-c1f9c08e></a></div>", 1);

var _hoisted_3 = {
  "class": "navbar-menu-wrapper d-flex align-items-center justify-content-end"
};

var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-toggle=\"minimize\" data-v-c1f9c08e><span class=\"icon-menu\" data-v-c1f9c08e></span></button><ul class=\"navbar-nav mr-lg-2\" data-v-c1f9c08e><li class=\"nav-item nav-search d-none d-lg-block\" data-v-c1f9c08e><div class=\"input-group\" data-v-c1f9c08e><div class=\"input-group-prepend hover-cursor\" id=\"navbar-search-icon\" data-v-c1f9c08e><span class=\"input-group-text\" id=\"search\" data-v-c1f9c08e><i class=\"icon-search\" data-v-c1f9c08e></i></span></div><input type=\"text\" class=\"form-control\" id=\"navbar-search-input\" placeholder=\"Search now\" aria-label=\"search\" aria-describedby=\"search\" data-v-c1f9c08e></div></li></ul>", 2);

var _hoisted_6 = {
  "class": "navbar-nav navbar-nav-right"
};

var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<li class=\"nav-item dropdown\" data-v-c1f9c08e><a class=\"nav-link count-indicator dropdown-toggle\" id=\"notificationDropdown\" href=\"#\" data-toggle=\"dropdown\" data-v-c1f9c08e><i class=\"icon-bell mx-0\" data-v-c1f9c08e></i><span class=\"count\" data-v-c1f9c08e></span></a><div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"notificationDropdown\" data-v-c1f9c08e><p class=\"mb-0 font-weight-normal float-left dropdown-header\" data-v-c1f9c08e>Notifications</p><a class=\"dropdown-item preview-item\" data-v-c1f9c08e><div class=\"preview-thumbnail\" data-v-c1f9c08e><div class=\"preview-icon bg-success\" data-v-c1f9c08e><i class=\"ti-info-alt mx-0\" data-v-c1f9c08e></i></div></div><div class=\"preview-item-content\" data-v-c1f9c08e><h6 class=\"preview-subject font-weight-normal\" data-v-c1f9c08e>Application Error</h6><p class=\"font-weight-light small-text mb-0 text-muted\" data-v-c1f9c08e> Just now </p></div></a><a class=\"dropdown-item preview-item\" data-v-c1f9c08e><div class=\"preview-thumbnail\" data-v-c1f9c08e><div class=\"preview-icon bg-warning\" data-v-c1f9c08e><i class=\"ti-settings mx-0\" data-v-c1f9c08e></i></div></div><div class=\"preview-item-content\" data-v-c1f9c08e><h6 class=\"preview-subject font-weight-normal\" data-v-c1f9c08e>Settings</h6><p class=\"font-weight-light small-text mb-0 text-muted\" data-v-c1f9c08e> Private message </p></div></a><a class=\"dropdown-item preview-item\" data-v-c1f9c08e><div class=\"preview-thumbnail\" data-v-c1f9c08e><div class=\"preview-icon bg-info\" data-v-c1f9c08e><i class=\"ti-user mx-0\" data-v-c1f9c08e></i></div></div><div class=\"preview-item-content\" data-v-c1f9c08e><h6 class=\"preview-subject font-weight-normal\" data-v-c1f9c08e>New user registration</h6><p class=\"font-weight-light small-text mb-0 text-muted\" data-v-c1f9c08e> 2 days ago </p></div></a></div></li>", 1);

var _hoisted_8 = {
  "class": "nav-item nav-profile dropdown"
};
var _hoisted_9 = {
  "class": "nav-link dropdown-toggle",
  href: "#",
  "data-toggle": "dropdown",
  id: "profileDropdown"
};
var _hoisted_10 = {
  "class": "dropdown-menu dropdown-menu-right navbar-dropdown",
  "aria-labelledby": "profileDropdown"
};

var _hoisted_11 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
  "class": "dropdown-item"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "ti-settings text-primary"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Settings ")], -1
/* HOISTED */
);

var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "ti-power-off text-primary"
}, null, -1
/* HOISTED */
);

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Выход ");

var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "nav-item nav-settings d-none d-lg-flex"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
  "class": "nav-link",
  href: "#"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "icon-ellipsis"
})])], -1
/* HOISTED */
);

var _hoisted_15 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("button", {
  "class": "navbar-toggler navbar-toggler-right d-lg-none align-self-center",
  type: "button",
  "data-toggle": "offcanvas"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "icon-menu"
})], -1
/* HOISTED */
);

(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)(null);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)("nav", _hoisted_1, [_hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_3, [_hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("ul", _hoisted_6, [_hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
    src: $data.authUserData.avatar,
    alt: $data.authUserData.avatar
  }, null, 8
  /* PROPS */
  , ["src", "alt"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_10, [_hoisted_11, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
    "class": "dropdown-item",
    onClick: _cache[1] || (_cache[1] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
      return $options.logout($event);
    }, ["prevent"]))
  }, [_hoisted_12, _hoisted_13])])]), _hoisted_14]), _hoisted_15])]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)("data-v-292aaba0");

var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"theme-setting-wrapper\" data-v-292aaba0><div id=\"settings-trigger\" data-v-292aaba0><i class=\"ti-settings\" data-v-292aaba0></i></div><div id=\"theme-settings\" class=\"settings-panel\" data-v-292aaba0><i class=\"settings-close ti-close\" data-v-292aaba0></i><p class=\"settings-heading\" data-v-292aaba0>SIDEBAR SKINS</p><div class=\"sidebar-bg-options selected\" id=\"sidebar-light-theme\" data-v-292aaba0><div class=\"img-ss rounded-circle bg-light border mr-3\" data-v-292aaba0></div>Light </div><div class=\"sidebar-bg-options\" id=\"sidebar-dark-theme\" data-v-292aaba0><div class=\"img-ss rounded-circle bg-dark border mr-3\" data-v-292aaba0></div>Dark </div><p class=\"settings-heading mt-2\" data-v-292aaba0>HEADER SKINS</p><div class=\"color-tiles mx-0 px-4\" data-v-292aaba0><div class=\"tiles success\" data-v-292aaba0></div><div class=\"tiles warning\" data-v-292aaba0></div><div class=\"tiles danger\" data-v-292aaba0></div><div class=\"tiles info\" data-v-292aaba0></div><div class=\"tiles dark\" data-v-292aaba0></div><div class=\"tiles default\" data-v-292aaba0></div></div></div></div>", 1);

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  id: "right-sidebar",
  "class": "settings-panel"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "settings-close ti-close"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("ul", {
  "class": "nav nav-tabs border-top",
  id: "setting-panel",
  role: "tablist"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "nav-item"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
  "class": "nav-link active",
  id: "todo-tab",
  "data-toggle": "tab",
  href: "#todo-section",
  role: "tab",
  "aria-controls": "todo-section",
  "aria-expanded": "true"
}, "TO DO LIST")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "nav-item"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
  "class": "nav-link",
  id: "chats-tab",
  "data-toggle": "tab",
  href: "#chats-section",
  role: "tab",
  "aria-controls": "chats-section"
}, "CHATS")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "tab-content",
  id: "setting-content"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "tab-pane fade show active scroll-wrapper",
  id: "todo-section",
  role: "tabpanel",
  "aria-labelledby": "todo-section"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "add-items d-flex px-3 mb-0"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("form", {
  "class": "form w-100"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "form-group d-flex"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("input", {
  type: "text",
  "class": "form-control todo-list-input",
  placeholder: "Add To-do"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("button", {
  type: "submit",
  "class": "add btn btn-primary todo-list-add-btn",
  id: "add-task"
}, "Add")])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "list-wrapper px-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("ul", {
  "class": "d-flex flex-column-reverse todo-list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "form-check"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("label", {
  "class": "form-check-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("input", {
  "class": "checkbox",
  type: "checkbox"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Team review meeting at 3.00 PM ")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "remove ti-close"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "form-check"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("label", {
  "class": "form-check-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("input", {
  "class": "checkbox",
  type: "checkbox"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Prepare for presentation ")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "remove ti-close"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "form-check"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("label", {
  "class": "form-check-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("input", {
  "class": "checkbox",
  type: "checkbox"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Resolve all the low priority tickets due today ")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "remove ti-close"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "completed"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "form-check"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("label", {
  "class": "form-check-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("input", {
  "class": "checkbox",
  type: "checkbox",
  checked: ""
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Schedule meeting for next week ")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "remove ti-close"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "completed"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "form-check"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("label", {
  "class": "form-check-label"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("input", {
  "class": "checkbox",
  type: "checkbox",
  checked: ""
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Project review ")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "remove ti-close"
})])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("h4", {
  "class": "px-3 text-muted mt-5 font-weight-light mb-0"
}, "Events"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "events pt-4 px-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "wrapper d-flex mb-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "ti-control-record text-primary mr-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", null, "Feb 11 2018")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", {
  "class": "mb-0 font-weight-thin text-gray"
}, "Creating component page build a js"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", {
  "class": "text-gray mb-0"
}, "The total number of sessions")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "events pt-4 px-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "wrapper d-flex mb-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
  "class": "ti-control-record text-primary mr-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", null, "Feb 7 2018")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", {
  "class": "mb-0 font-weight-thin text-gray"
}, "Meeting with Alisa"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", {
  "class": "text-gray mb-0 "
}, "Call Sarah Graves")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" To do section tab ends "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "tab-pane fade",
  id: "chats-section",
  role: "tabpanel",
  "aria-labelledby": "chats-section"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "d-flex align-items-center justify-content-between border-bottom"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", {
  "class": "settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0"
}, "Friends"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal"
}, "See All")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("ul", {
  "class": "chat-list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "list active"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "profile"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
  src: "images/faces/face1.jpg",
  alt: "image"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "online"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "info"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Thomas Douglas"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Available")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "text-muted my-auto"
}, "19 min")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "profile"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
  src: "images/faces/face2.jpg",
  alt: "image"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "offline"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "info"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "wrapper d-flex"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Catherine")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Away")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "badge badge-success badge-pill my-auto mx-2"
}, "4"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "text-muted my-auto"
}, "23 min")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "profile"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
  src: "images/faces/face3.jpg",
  alt: "image"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "online"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "info"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Daniel Russell"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Available")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "text-muted my-auto"
}, "14 min")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "profile"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
  src: "images/faces/face4.jpg",
  alt: "image"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "offline"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "info"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "James Richardson"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Away")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "text-muted my-auto"
}, "2 min")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "profile"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
  src: "images/faces/face5.jpg",
  alt: "image"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "online"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "info"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Madeline Kennedy"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Available")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "text-muted my-auto"
}, "5 min")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("li", {
  "class": "list"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "profile"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
  src: "images/faces/face6.jpg",
  alt: "image"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", {
  "class": "online"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
  "class": "info"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Sarah Graves"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("p", null, "Available")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("small", {
  "class": "text-muted my-auto"
}, "47 min")])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" chat tab ends ")])], -1
/* HOISTED */
);

(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)(null);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [_hoisted_1, _hoisted_2], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)("data-v-555db4c5");

var _hoisted_1 = {
  "class": "sidebar sidebar-offcanvas",
  id: "sidebar"
};
var _hoisted_2 = {
  "class": "nav"
};
var _hoisted_3 = {
  "class": "menu-title"
};

(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)(null);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_router_link = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("router-link");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)("nav", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("ul", _hoisted_2, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.sidebarLinks, function (link, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)("li", {
      "class": "nav-item",
      key: index
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
      tag: "a",
      "class": "nav-link",
      to: {
        name: link.name
      },
      "router-link-active": ""
    }, {
      "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
        return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("i", {
          "class": ["menu-icon", link.icon]
        }, null, 2
        /* CLASS */
        ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("span", _hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(link.title), 1
        /* TEXT */
        )];
      }),
      _: 2
      /* DYNAMIC */

    }, 1032
    /* PROPS, DYNAMIC_SLOTS */
    , ["to"])]);
  }), 128
  /* KEYED_FRAGMENT */
  ))])]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2 ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "container-fluid page-body-wrapper"
};
var _hoisted_2 = {
  "class": "main-panel"
};
var _hoisted_3 = {
  "class": "content-wrapper"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_navbar_component = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("navbar-component");

  var _component_settings_panel_component = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("settings-panel-component");

  var _component_sidebar_component = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("sidebar-component");

  var _component_router_view = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("router-view");

  var _component_footer_component = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("footer-component");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <div> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_navbar_component), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_settings_panel_component), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_sidebar_component), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_view)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_footer_component)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" </div> ")], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./resources/js/components/includes/partials/FooterComponent.vue":
/*!***********************************************************************!*\
  !*** ./resources/js/components/includes/partials/FooterComponent.vue ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _FooterComponent_vue_vue_type_template_id_00b4a00e_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true */ "./resources/js/components/includes/partials/FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true");
/* harmony import */ var _FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FooterComponent.vue?vue&type=script&lang=js */ "./resources/js/components/includes/partials/FooterComponent.vue?vue&type=script&lang=js");



_FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.render = _FooterComponent_vue_vue_type_template_id_00b4a00e_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render
_FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__scopeId = "data-v-00b4a00e"
/* hot reload */
if (false) {}

_FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__file = "resources/js/components/includes/partials/FooterComponent.vue"

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default);

/***/ }),

/***/ "./resources/js/components/includes/partials/NavbarComponent.vue":
/*!***********************************************************************!*\
  !*** ./resources/js/components/includes/partials/NavbarComponent.vue ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _NavbarComponent_vue_vue_type_template_id_c1f9c08e_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true */ "./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true");
/* harmony import */ var _NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NavbarComponent.vue?vue&type=script&lang=js */ "./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=script&lang=js");



_NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.render = _NavbarComponent_vue_vue_type_template_id_c1f9c08e_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render
_NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__scopeId = "data-v-c1f9c08e"
/* hot reload */
if (false) {}

_NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__file = "resources/js/components/includes/partials/NavbarComponent.vue"

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default);

/***/ }),

/***/ "./resources/js/components/includes/partials/SettingsPanelComponent.vue":
/*!******************************************************************************!*\
  !*** ./resources/js/components/includes/partials/SettingsPanelComponent.vue ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _SettingsPanelComponent_vue_vue_type_template_id_292aaba0_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true */ "./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true");
/* harmony import */ var _SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SettingsPanelComponent.vue?vue&type=script&lang=js */ "./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=script&lang=js");



_SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.render = _SettingsPanelComponent_vue_vue_type_template_id_292aaba0_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render
_SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__scopeId = "data-v-292aaba0"
/* hot reload */
if (false) {}

_SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__file = "resources/js/components/includes/partials/SettingsPanelComponent.vue"

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default);

/***/ }),

/***/ "./resources/js/components/includes/partials/SidebarComponent.vue":
/*!************************************************************************!*\
  !*** ./resources/js/components/includes/partials/SidebarComponent.vue ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _SidebarComponent_vue_vue_type_template_id_555db4c5_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true */ "./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true");
/* harmony import */ var _SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SidebarComponent.vue?vue&type=script&lang=js */ "./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=script&lang=js");



_SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.render = _SidebarComponent_vue_vue_type_template_id_555db4c5_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render
_SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__scopeId = "data-v-555db4c5"
/* hot reload */
if (false) {}

_SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__file = "resources/js/components/includes/partials/SidebarComponent.vue"

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default);

/***/ }),

/***/ "./resources/js/components/layouts/IndexLayoutComponent.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/layouts/IndexLayoutComponent.vue ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _IndexLayoutComponent_vue_vue_type_template_id_7b8bfbf2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2 */ "./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2");
/* harmony import */ var _IndexLayoutComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./IndexLayoutComponent.vue?vue&type=script&lang=js */ "./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=script&lang=js");



_IndexLayoutComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.render = _IndexLayoutComponent_vue_vue_type_template_id_7b8bfbf2__WEBPACK_IMPORTED_MODULE_0__.render
/* hot reload */
if (false) {}

_IndexLayoutComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__file = "resources/js/components/layouts/IndexLayoutComponent.vue"

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_IndexLayoutComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default);

/***/ }),

/***/ "./resources/js/components/includes/partials/FooterComponent.vue?vue&type=script&lang=js":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/FooterComponent.vue?vue&type=script&lang=js ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_FooterComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./FooterComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/FooterComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=script&lang=js":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=script&lang=js ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_NavbarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./NavbarComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=script&lang=js":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=script&lang=js ***!
  \******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SettingsPanelComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./SettingsPanelComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=script&lang=js":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=script&lang=js ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SidebarComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./SidebarComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=script&lang=js":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=script&lang=js ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_IndexLayoutComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_IndexLayoutComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./IndexLayoutComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/includes/partials/FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true":
/*!*****************************************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true ***!
  \*****************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_FooterComponent_vue_vue_type_template_id_00b4a00e_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_FooterComponent_vue_vue_type_template_id_00b4a00e_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/FooterComponent.vue?vue&type=template&id=00b4a00e&scoped=true");


/***/ }),

/***/ "./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true":
/*!*****************************************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true ***!
  \*****************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_NavbarComponent_vue_vue_type_template_id_c1f9c08e_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_NavbarComponent_vue_vue_type_template_id_c1f9c08e_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/NavbarComponent.vue?vue&type=template&id=c1f9c08e&scoped=true");


/***/ }),

/***/ "./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true":
/*!************************************************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true ***!
  \************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SettingsPanelComponent_vue_vue_type_template_id_292aaba0_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SettingsPanelComponent_vue_vue_type_template_id_292aaba0_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SettingsPanelComponent.vue?vue&type=template&id=292aaba0&scoped=true");


/***/ }),

/***/ "./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SidebarComponent_vue_vue_type_template_id_555db4c5_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_SidebarComponent_vue_vue_type_template_id_555db4c5_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/includes/partials/SidebarComponent.vue?vue&type=template&id=555db4c5&scoped=true");


/***/ }),

/***/ "./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2 ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_IndexLayoutComponent_vue_vue_type_template_id_7b8bfbf2__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_IndexLayoutComponent_vue_vue_type_template_id_7b8bfbf2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/layouts/IndexLayoutComponent.vue?vue&type=template&id=7b8bfbf2");


/***/ })

}]);