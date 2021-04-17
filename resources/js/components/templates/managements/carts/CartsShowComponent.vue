<template>
    <!-- Show products list -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Заказанный продукты</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Изображение</th>
                            <th>Называние</th>
                            <th>Категория</th>
                            <th>Цена$ (Акц цена$) x (коль-во) = ?$ (?$)</th>
                            <th>Рейтинг</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="(order, index) in cart?.orders" :key="index">
                            <td>{{ order.id }}</td>
                            <td class="py-1">
                                <img :src="getImage(order)" alt="image" style="border-radius: 10%;" />
                            </td>
                            <td>{{ order.title }}</td>
                            <td>{{ order.category.slug }}</td>
                            <td>{{ `${order.price}$(${order.sale_price}$) x ${order.quantity} = ${order.cart_price}$ (${order.cart_sale_price}$)` }}</td>
                            <td>{{ order.rating }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-sm" type="button" @click.prevent="showProduct($event, order)">
                                        Поспотреть
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

                <hr>
            </div>
        </div>
    </div>
    <!-- End Show products list -->

    <br>
    <br>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Адрес</h4>
            <!-- <p class="card-description">
                Use <code>&lt;address&gt;</code> tag
            </p> -->
            <div class="row">
                <div class="col-md-6">
                    <address class="text-primary">
                        <p class="font-weight-bold">
                            Заказчик
                        </p>
                        <p class="mb-2">
                            {{ cart?.author.full_name ?? null }}
                        </p>

                        <p class="font-weight-bold">
                            Телефон
                        </p>
                        <p class="mb-2">
                            {{ cart?.author.phone }}
                        </p>

                        <p class="font-weight-bold">
                            Сайт
                        </p>
                        <p>
                            {{ cart?.author.phone }}
                        </p>

                        <p class="font-weight-bold">
                            Акаунт
                        </p>
                        <p>
                            {{ cart?.author.is_blocked ? 'Заблокирован' : 'Не заблокирован' }}
                        </p>

                        <p class="font-weight-bold">
                            Верифицировал почту
                        </p>
                        <p>
                            {{ cart?.author.email_verified_at }}
                        </p>

                        <p class="font-weight-bold">
                            Последний активность
                        </p>
                        <p>
                            {{ cart?.author.last_login }}
                        </p>

                        <p class="font-weight-bold">
                            Дата регистрации
                        </p>
                        <p>
                            {{ cart?.author.created_at }}
                        </p>
                    </address>
                </div>
                <div class="col-md-6">
                    <address>
                        <p class="font-weight-bold">Доставка по адресу</p>
                        <p>
                            Город: {{ cart?.address.city }}
                        </p>
                        <p>
                            Улица: {{ cart?.address.address_street }}
                        </p>
                        <p>
                            Переулок: {{ cart?.address.address_lane }}
                        </p>
                        <p>
                            Zip: {{ cart?.address.postal_code }}
                        </p>
                        <p class="font-weight-bold">Данные получателья</p>
                        <p>
                            Имя: {{ cart?.address.name }}
                        </p>
                        <p>
                            Телефон: {{ cart?.address.phone_number }}
                        </p>
                    </address>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="card-title">Lead</h4>
            <p class="card-description">
                Статус <code :class="{ 
                                    'badge-warning': cart?.status == 'waiting',
                                    'badge-success': cart?.status == 'approved',
                                    'badge-danger': cart?.status == 'cancel',
                                }">{{ statusTranslate(cart?.status) }}</code>
            </p>
            <p class="lead">
                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
            </p>
            <hr>
            <div class="template-demo">
                <button type="button" class="btn btn-inverse-success btn-fw" :disabled="cart?.status == 'approved'" @click.prevent="changeStatus('approved')">Обработан</button>
                <button type="button" class="btn btn-inverse-warning btn-fw" :disabled="cart?.status == 'waiting'" @click.prevent="changeStatus('waiting')">В ожидании</button>
                <button type="button" class="btn btn-inverse-danger btn-fw" :disabled="cart?.status == 'cancel'" @click.prevent="changeStatus('cancel')">Отменить</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            id: {
                type: Number,
                required: true
            },
        },
        data() {
            return {
                cart: null,
            }
        },
        methods: {
            async getCart(id) {
                await this.$store.dispatch('cart/getCart', id).then((result) => {
                    this.cart = result;
                }).catch((err) => { });
            },
            getImage(order) {
                return order.images?.length ? `${ order.images[0].path }/${ order.images[0].name }` : '/admin/images/faces/face1.jpg';
            },
            showProduct(event, order) {
                console.log("order: ", order);
                this.$router.push({ name: 'managements.products.show', params: { id: order.id } });
            },
            changeStatus(status) {
                this.$store.dispatch('cart/changeStatus', { id: this.cart.id, data: status }).then((result) => {
                    this.cart.status = result.status;
                }).catch((err) => { });
            },
            statusTranslate: function(value) {
                switch (value) {
                    case 'waiting': return 'В ожидани'; break;
                    case 'approved': return 'Обработан'; break;
                    case 'cancel': return 'Отменен'; break;                
                    default: '...'; break;
                }
            },
        },
        created() {
            this.getCart(this.id);
        },
    }
</script>

<style lang="scss" scoped>

</style>