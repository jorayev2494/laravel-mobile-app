const routes = [
    {
        name: 'index',
        path: '/',
        redirect: { name: 'dashboard' },
        component: () => import('../components/layouts/IndexLayoutComponent.vue'),
        children: [
            {
                name: 'dashboard',
                path: '/dashboard',
                component: () => import('../components/templates/DashboardComponent.vue'),
                meta: { 
                    middleware: [
                        'auth'
                    ]
                }
            }
        ],
        meta: { 
            middleware: [
                'auth'
            ]
        }
    },
    // Authorize Routes
    {
        name: 'auth',
        path: '/auth',
        component: import('../components/layouts/AuthorizeLayoutComponent.vue'),
        children: [
            {
                name: 'auth.login',
                path: '/auth/login',
                component: () => import('../components/templates/authorize/LoginComponent.vue'),
                meta: {
                    middleware: [
                        'guest'
                    ]
                }
            },
            // {
            //     name: 'auth.password.recovery',
            //     path: '/auth/password/recovery',
            //     component: () => import('./pathToComponent'),
            // },
        ]
    },

    // Managements Routes
    {
        name: 'managements',
        path: '/managements',
        component: () => import('../components/layouts/IndexLayoutComponent.vue'),
        children: [
            // Users
            {
                name: 'managements.users',
                path: '/managements/users',
                redirect: { name: 'managements.users.list' },
                component: () => import('../components/templates/managements/users/UsersComponent.vue'),
                children: [
                    {
                        name: 'managements.users.list',
                        path: '/managements/users/list',
                        meta: { 
                            middleware: ['auth']
                        },
                        component: () => import('../components/templates/managements/users/UsersListComponent.vue'),
                    },
                ]
            },

            // Categories
            {
                name: 'managements.categories',
                path: '/managements/categories',
                redirect: { name: 'managements.categories.list' },
                component: () => import('../components/templates/managements/categories/CategoriesComponent.vue'),
                meta: { 
                    middleware: ['auth']
                },
                children: [
                    {
                        name: 'managements.categories.list',
                        path: '/managements/categories/list',
                        component: () => import('../components/templates/managements/categories/CategoriesListComponent.vue'),
                    },
                    {
                        name: 'managements.categories.create',
                        path: '/managements/categories/create',
                        component: () => import('../components/templates/managements/categories/CategoryCreateComponent.vue'),
                    },
                    {
                        name: 'managements.categories.show',
                        path: '/managements/categories/show/:id',
                        props: true,
                        component: () => import('../components/templates/managements/categories/CategoryShowComponent.vue'),
                    },
                ]
            },

            // Products
            {
                name: 'managements.products',
                path: '/managements/products',
                redirect: { name: 'managements.products.list' },
                meta: { 
                    middleware: ['auth']
                 },
                component: () => import('../components/templates/managements/products/ProductsComponent.vue'),
                children: [
                    {
                        path: '/managements/products/list',
                        name: 'managements.products.list',
                        meta: { 
                            middleware: ['auth']
                        },
                        component: () => import('../components/templates/managements/products/ProductsListComponent.vue'),
                    },
                    {
                        name: 'managements.products.create',
                        path: '/managements/products/create',
                        props: true,
                        component: () => import('../components/templates/managements/products/ProductCreateComponent.vue'),
                    },
                    {
                        name: 'managements.products.show',
                        path: '/managements/products/:id',
                        props: true,
                        component: () => import('../components/templates/managements/products/ProductShowComponent.vue'),
                    },
                ]
            },

            // Orders
            {
                name: 'managements.orders',
                path: '/managements/orders',
                component: () => import('../components/templates/managements/orders/OrdersComponent.vue'),
            },
        ]
    },
    // 404 not found page
    {
        name: '404',
        path: '/:pathMatch(.*)*',
        // component: { render: (h) => h("div", ["404! Page Not Found!"]) },
        component: () => import('../components/errors/404.vue'),
    }
];

export default routes;