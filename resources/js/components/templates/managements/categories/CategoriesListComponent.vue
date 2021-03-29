<template>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Категории</h4>
            <button type="button" class="btn btn-success" @click.prevent="createCategory($event)">Добавить категорию</button>
            <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Изображение</th>
                    <th>Называние</th>
                    <!-- <th>Статус</th> -->
                    <th>Коль-во продукт</th>
                    <th>Действие</th>
                    <!-- <th>Deadline</th> -->
                </tr>
                </thead>
                <tbody>

                <tr v-for="(category, index) in categories" :key="index">
                    <td>{{ category.id }}</td>
                    <td>
                        <img :src="category.image" :alt="category.image" style="border-radius: 10%;" />
                    </td>
                    <td>{{ category.slug }}</td>
                    <!-- <td>
                        <label class="badge" :class="{ 'badge-success': !category.is_active, 'badge-danger': category.is_active, }">
                            {{ category.is_blocked ? status.blocked : status.unblocked }}
                        </label>
                    </td> -->
                    <td>{{ category.products_count ?? 0 }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button" :id="`dropdownMenuSizeButton-${category.id}`" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Действие
                            </button>
                            <div class="dropdown-menu" :aria-labelledby="`dropdownMenuSizeButton-${category.id}`" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                <h6 class="dropdown-header">Действии</h6>
                                <!-- <a class="dropdown-item" href="#">Посмотрет</a> -->
                                <a class="dropdown-item" href="#" @click.prevent="showCategory($event, category)">Редактировать</a>
                                <a class="dropdown-item" href="#" @click.prevent="deleteCategory($event, index, category)">Удалить</a>
                                <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" @click="toggleBlock($event, index, category)">
                                    {{ category.is_active ? action.unblock : action.block }}
                                </a> -->
                            </div>
                        </div>
                    </td>
                    <!-- <td>May 15, 2015</td> -->
                </tr>
                
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                status: {
                    unblocked: 'Не заблокирован',
                    blocked: 'Заблокирован',
                },
                action: {
                    unblock: 'Разблокировать',
                    block: 'Заблокировать',
                }
            }
        },
        methods: {
            async loadCategories() {
                await this.$store.dispatch('category/loadCategories').then((result) => {
                    this.categories = result;
                }).catch((err) => {
                    
                });
            },
            async toggleBlock(event, index, category) {
                await this.$store.dispatch('category/deleteCategory').then((result) => {
                    this.categories[index] = result;
                }).catch((err) => {
                    
                });
            },
            async deleteCategory(event, index, category) {
                let confirmeed = window.confirm(`Вы действительно хотите удалить категорию \r\n '${category.slug}'?`);

                if (confirmeed) {
                    await this.$store.dispatch('category/deleteCategory', category).then((result) => {
                        this.categories.splice(index, 1);
                    }).catch((err) => { });
                }
            },
            createCategory: function(event) {
                this.$router.push({ name: 'managements.categories.create' });
            },
            showCategory(event, category) {
                this.$router.push({ name: 'managements.categories.show', params: { id: category.id } });
            }
        },
        created () {
            this.loadCategories();
        },
    }
</script>

<style lang="scss" scoped>

</style>