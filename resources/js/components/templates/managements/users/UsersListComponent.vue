<template>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Striped Table</h4>
                <!-- <p class="card-description">
                    Add class <code>.table-striped</code>
                </p> -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Аватар
                                </th>
                                <th>
                                    Имя
                                </th>
                                <th>
                                    Статус
                                </th>
                                <th>
                                    Почта
                                </th>
                                <th>
                                    Телефон
                                </th>
                                <th>
                                    Зарегистирираван
                                </th>
                                <th>
                                    Действие
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users" :key="index">
                                <td class="py-1">
                                    <img :src="user.avatar" :alt="user.avatar" />
                                </td>
                                <td>
                                    {{ user.full_name }}
                                </td>
                                <td>
                                    <label class="badge" :class="{ 'badge-success': !user.is_blocked, 'badge-danger': user.is_blocked, }">
                                        {{ user.is_blocked ? status.blocked : status.unblocked }}
                                    </label>
                                </td>
                                <td>
                                    {{ user.email }}
                                </td>
                                <td>
                                    {{ user.phone }}
                                </td>
                                <td>
                                    {{ user.created_at }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" :id="`dropdownMenuSizeButton-${user.id}`" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Действие
                                        </button>
                                        <div class="dropdown-menu" :aria-labelledby="`dropdownMenuSizeButton-${user.id}`" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <h6 class="dropdown-header">Действии</h6>
                                            <a class="dropdown-item" href="#">Посмотрет</a>
                                            <a class="dropdown-item" href="#">Редактировать</a>
                                            <a class="dropdown-item" href="#" @click.prevent="deleteUser($event, index, user)">Удалить</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" @click="loggleBlock($event, index, user)">
                                                {{ user.is_blocked ? action.unblock : action.block }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
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
                users: [],
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
            async loadUsers() {
                await this.$store.dispatch('users/loadUsers').then((result) => {
                    this.users = result;
                }).catch((err) => { });
            },
            async loggleBlock(event, index, user) {
                await this.$store.dispatch('users/toggleBlock', user).then((result) => {
                    this.users[index] = result;
                }).catch((err) => {
                    
                });
            },
            async deleteUser(event, index, user) {
                let confirmeed = window.confirm(`Вы действительно хотите удалить пользователя \r\n '${user.full_name}'?`);

                if (confirmeed) {
                    await this.$store.dispatch('users/deleteUser', user).then((result) => {
                        this.users.splice(index, 1);
                    }).catch((err) => { });
                }
            }
        },
        async created() {
            await this.loadUsers();
        },
    }
</script>

<style lang="scss" scoped>

</style>
