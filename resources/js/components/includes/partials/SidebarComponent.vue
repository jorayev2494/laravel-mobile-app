<template>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

            <li class="nav-item" v-for="(link, index) in sidebarLinks" :key="index">
                <router-link tag="a" class="nav-link" :to="{ name: link.name }" router-link-active>
                    <i class="menu-icon" :class="link.icon"></i>
                    <span class="menu-title">{{ link.title }}</span>
                </router-link>
            </li>

        </ul>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                sidebarLinks: [
                    {
                        name: 'dashboard',
                        icon: 'icon-grid',
                        title: 'Dasboard'
                    },
                    {
                        name: 'managements.users',
                        icon: 'icon-head',
                        title: 'Пользователи'
                    },
                    {
                        name: 'managements.categories',
                        icon: 'icon-head',
                        title: 'Категории'
                    },
                    {
                        name: 'managements.products',
                        icon: 'icon-head',
                        title: 'Продукты'
                    },
                    {
                        name: 'managements.carts',
                        icon: 'icon-head',
                        title: 'Заказы'
                    }
                ]
            }
        },
        
    }
</script>

<style lang="scss" scoped>

</style>
