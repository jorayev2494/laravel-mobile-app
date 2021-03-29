<template>
    <div>
        <h1>This is Orders</h1>
        <router-link :to="{ name: 'managements.users' }">Users</router-link>
        <br>
        <router-link :to="{ name: 'managements.products' }">Products</router-link>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>