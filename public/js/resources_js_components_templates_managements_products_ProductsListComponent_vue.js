(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_templates_managements_products_ProductsListComponent_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************************************************/
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
      products: [],
      perPage: 2
    };
  },
  methods: {
    loadProducts: function loadProducts() {
      var _arguments = arguments,
          _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        var currentPage;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                currentPage = _arguments.length > 0 && _arguments[0] !== undefined ? _arguments[0] : 1;
                _context.next = 3;
                return _this.$store.dispatch('product/loadProducts', {
                  currentPage: currentPage,
                  perPage: _this.perPage
                }).then(function (result) {
                  _this.products = result;
                })["catch"](function (err) {});

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    getImage: function getImage(product) {
      return product.images.length ? "".concat(product.images[0].path, "/").concat(product.images[0].name) : '/admin/images/faces/face1.jpg';
    },
    deleteProduct: function deleteProduct(event, index, product) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return _this2.$store.dispatch('product/deleteProduct', product).then(function (result) {
                  if (result) _this2.products.splice(index, 1);
                })["catch"](function (err) {});

              case 2:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    showProduct: function showProduct(event, product) {
      this.$router.push({
        name: 'managements.products.show',
        params: {
          id: product.id
        }
      });
    },
    createProduct: function createProduct(event) {
      this.$router.push({
        name: 'managements.products.create'
      });
    }
  },
  created: function created() {
    var _this3 = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee3() {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              _context3.next = 2;
              return _this3.loadProducts();

            case 2:
              ;

            case 3:
            case "end":
              return _context3.stop();
          }
        }
      }, _callee3);
    }))();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)("data-v-ce161ea0");

var _hoisted_1 = {
  "class": "col-lg-12 grid-margin stretch-card"
};
var _hoisted_2 = {
  "class": "card"
};
var _hoisted_3 = {
  "class": "card-body"
};

var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("h4", {
  "class": "card-title"
}, "Продукты", -1
/* HOISTED */
);

var _hoisted_5 = {
  "class": "table-responsive"
};
var _hoisted_6 = {
  "class": "table table-striped"
};

var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("thead", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("tr", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "#"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "Изображение"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "Называние"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "Категория"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "Цена"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "Рейтинг"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("th", null, "Действие")])], -1
/* HOISTED */
);

var _hoisted_8 = {
  "class": "py-1"
};
var _hoisted_9 = {
  "class": "dropdown"
};

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("hr", null, null, -1
/* HOISTED */
);

var _hoisted_11 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("h3", null, "There shoud to be pagination", -1
/* HOISTED */
);

(0,vue__WEBPACK_IMPORTED_MODULE_0__.setScopeId)(null);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_3, [_hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("button", {
    type: "button",
    "class": "btn btn-success",
    onClick: _cache[1] || (_cache[1] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
      return $options.createProduct($event);
    }, ["prevent"]))
  }, "Добавить продукт"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("table", _hoisted_6, [_hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("tbody", null, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.products, function (product, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)("tr", {
      key: index
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.id), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("img", {
      src: $options.getImage(product),
      alt: "image",
      style: {
        "border-radius": "10%"
      }
    }, null, 8
    /* PROPS */
    , ["src"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.title), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.category.slug), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)("".concat(product.price, "$ - (").concat(product.sale_price, "$)")), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.rating), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("td", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("button", {
      "class": "btn btn-danger btn-sm dropdown-toggle",
      type: "button",
      id: "dropdownMenuSizeButton-".concat(product.id),
      "data-toggle": "dropdown",
      "aria-haspopup": "true",
      "aria-expanded": "false"
    }, " Действие ", 8
    /* PROPS */
    , ["id"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("div", {
      "class": "dropdown-menu",
      "aria-labelledby": "dropdownMenuSizeButton-".concat(product.id),
      "x-placement": "bottom-start",
      style: {
        "position": "absolute",
        "will-change": "transform",
        "top": "0px",
        "left": "0px",
        "transform": "translate3d(0px, 30px, 0px)"
      }
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <a class=\"dropdown-item\" href=\"#\" @click.prevent=\"showProduct($event, product)\">Посмотрет</a> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
      "class": "dropdown-item",
      href: "#",
      onClick: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
        return $options.showProduct($event, product);
      }, ["prevent"])
    }, "Редактировать", 8
    /* PROPS */
    , ["onClick"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)("a", {
      "class": "dropdown-item",
      href: "#",
      onClick: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
        return $options.deleteProduct($event, index, product);
      }, ["prevent"])
    }, "Удалить", 8
    /* PROPS */
    , ["onClick"])], 8
    /* PROPS */
    , ["aria-labelledby"])])])]);
  }), 128
  /* KEYED_FRAGMENT */
  ))])]), _hoisted_10, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <pagination :data=\"products\"></pagination> "), _hoisted_11])])])]);
}

/***/ }),

/***/ "./resources/js/components/templates/managements/products/ProductsListComponent.vue":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/templates/managements/products/ProductsListComponent.vue ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProductsListComponent_vue_vue_type_template_id_ce161ea0_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true */ "./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true");
/* harmony import */ var _ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductsListComponent.vue?vue&type=script&lang=js */ "./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=script&lang=js");



_ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.render = _ProductsListComponent_vue_vue_type_template_id_ce161ea0_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render
_ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__scopeId = "data-v-ce161ea0"
/* hot reload */
if (false) {}

_ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default.__file = "resources/js/components/templates/managements/products/ProductsListComponent.vue"

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__.default);

/***/ }),

/***/ "./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=script&lang=js":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=script&lang=js ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsListComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ProductsListComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true":
/*!************************************************************************************************************************************!*\
  !*** ./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true ***!
  \************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsListComponent_vue_vue_type_template_id_ce161ea0_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsListComponent_vue_vue_type_template_id_ce161ea0_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/templates/managements/products/ProductsListComponent.vue?vue&type=template&id=ce161ea0&scoped=true");


/***/ })

}]);