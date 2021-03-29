<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <router-link :to="{ name: 'managements.users' }">Users</router-link>

                    <div class="card-body">
                        I'm an example component. {{ test }}
                    </div>

                    <div v-for="(product, k) in products" :key="k">
                        <img :src="getImage(product.images)" :alt="getImage(product.images)">
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: null,
                test: null
            }
        },
        methods: {
            getImage(images) {
                var image = images.length ? images[0] : null;
                if (image) {                    
                    console.log('image', image);
                    return `${window.location.href}storage${image.path}/${image.name}`;
                }
            }
        },
        mounted() {
            this.test = this.$store.getters['authorize/GET_TEST'];
            this.$store.commit('authorize/SET_TEST', 'component value');
            this.test = this.$store.getters['authorize/GET_TEST'];


            console.log('Component mounted.');
            this.$store.dispatch('authorize/ACTION_TEST');
            this.$axios.get('/api/products').then((response) => {
                this.products = response.data;
            }).catch((err) => {
                
            });            
        }
    }
</script>
