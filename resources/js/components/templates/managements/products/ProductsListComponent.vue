<template>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Продукты</h4>
                <button type="button" class="btn btn-success" @click.prevent="createProduct($event)">Добавить продукт</button>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Изображение</th>
                                <th>Называние</th>
                                <th>Категория</th>
                                <th>Цена</th>
                                <th>Рейтинг</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(product, index) in products" :key="index">
                                <td>{{ product.id }}</td>
                                <td class="py-1">
                                    <img :src="getImage(product)" alt="image" style="border-radius: 10%;" />
                                </td>
                                <td>{{ product.title }}</td>
                                <td>{{ product.category.slug }}</td>
                                <td>{{ `${product.price}$ - (${product.sale_price}$)` }}</td>
                                <td>{{ product.rating }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" :id="`dropdownMenuSizeButton-${product.id}`" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Действие
                                        </button>
                                        <div class="dropdown-menu" :aria-labelledby="`dropdownMenuSizeButton-${product.id}`" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <!-- <a class="dropdown-item" href="#" @click.prevent="showProduct($event, product)">Посмотрет</a> -->
                                            <a class="dropdown-item" href="#" @click.prevent="showProduct($event, product)">Редактировать</a>
                                            <a class="dropdown-item" href="#" @click.prevent="deleteProduct($event, index, product)">Удалить</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <hr>
                    <!-- <pagination :data="products"></pagination> -->
                    <h3>There shoud to be pagination</h3>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: [],
                perPage: 2
            }
        },
        methods: {
            async loadProducts(currentPage = 1) {
                await this.$store.dispatch('product/loadProducts', { currentPage, perPage: this.perPage }).then((result) => {
                    this.products = result;
                }).catch((err) => {});
            },
            getImage(product) {
                return product.images.length ? `${ product.images[0].path }/${ product.images[0].name }` : '/admin/images/faces/face1.jpg';
            },
            async deleteProduct(event, index, product) {                
                await this.$store.dispatch('product/deleteProduct', product).then((result) => {
                    if(result) this.products.splice(index, 1);
                }).catch((err) => { });
            },
            showProduct(event, product) {
                this.$router.push({ name: 'managements.products.show', params: { id: product.id } });
            },
            createProduct(event) {
                this.$router.push({ name: 'managements.products.create' });
            }
        },
        async created() {
            await this.loadProducts();;
        }
    }

</script>

<style lang="css" scoped>

</style>
