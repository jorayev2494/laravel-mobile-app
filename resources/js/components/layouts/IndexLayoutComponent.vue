<template>
    <!-- <div> -->
        <navbar-component></navbar-component>
        <div class="container-fluid page-body-wrapper">
            <settings-panel-component></settings-panel-component>
            <sidebar-component></sidebar-component>

            <div class="main-panel">
                <div class="content-wrapper">
                    <router-view></router-view>
                </div>

                <footer-component></footer-component>
            </div>
        </div>
    <!-- </div> -->
</template>

<script>
    export default {
        components: {
            NavbarComponent: require('../includes/partials/NavbarComponent.vue').default,
            SettingsPanelComponent: require('../includes/partials/SettingsPanelComponent.vue').default,
            SidebarComponent: require('../includes/partials/SidebarComponent.vue').default,
            FooterComponent: require('../includes/partials/FooterComponent.vue').default
        }
    }
</script>

<style lang="">
    
</style>