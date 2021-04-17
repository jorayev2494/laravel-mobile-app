<template>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Заказы</h4>
            <!-- <p class="card-description">
                Add class <code>.table-hover</code>
            </p> -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Заказчик</th>
                            <th>Коль-во заказа</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                            <th>Дата заказа</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cart, index) in carts" :key="index">
                            <td>{{ cart.author.full_name }}</td>
                            <td>{{ cart.quantity_orders }}</td>
                            <td>{{ cart.sum }}</td>
                            <td>
                                <label class="badge" :class="{ 
                                        'badge-warning': cart.status == 'waiting',
                                        'badge-success': cart.status == 'approved',
                                        'badge-danger': cart.status == 'cancel',
                                    }">{{ statusTranslate(cart.status) }}</label>
                            </td>
                            <td>{{ cart.created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-warning btn-sm" type="button" @click.prevent="goToShowCart(cart)">
                                        Посмотрет
                                    </button>                                    
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                carts: []
            }
        },
        methods: {
            async loadCarts() {
                await this.$store.dispatch('cart/getCarts').then((result) => {
                    this.carts = result;
                }).catch((err) => {});
            },
            statusTranslate: function(value) {
                switch (value) {
                    case 'waiting': return 'В ожидани'; break;
                    case 'approved': return 'Обработан'; break;
                    case 'cancel': return 'Отменен'; break;                
                    default: '...'; break;
                }
            },
            goToShowCart(cart) {
                this.$router.push({ name: 'managements.carts.show', params: { id: cart.id } });
            }
        },
        created() {
            this.loadCarts();
        },
    }
</script>

<style lang="scss" scoped>

</style>