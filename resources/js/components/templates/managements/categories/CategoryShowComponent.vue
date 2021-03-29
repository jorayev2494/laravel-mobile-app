<template>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Редактировать категорию</h4>
            <!-- <p class="card-description">
                Basic form layout
            </p> -->
            <form class="forms-sample" @submit.prevent="updateCategory($event)">
                <div class="form-group">
                    <label for="exampleInputUsername1">Называние</label>
                    <input type="text" class="form-control" name="slug" placeholder="Называние" v-model="category.slug">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Цвет</label>
                    <input type="text" class="form-control" name="color" placeholder="Цвет" v-model="category.color">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Состояние</label>
                    <select class="form-control" name="is_active" v-model="category.is_active">
                        <option value="1">Активный</option>
                        <option value="0">Не активный</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                    <input type="file" @change="changedImage($event)" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
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
                category: {
                    slug: null
                }
            }
        },
        methods: {
            async getCategory(id) {
                await this.$store.dispatch('category/getCategory', id).then((result) => {
                    this.category = result;
                }).catch((err) => { });
            },
            async updateCategory(event) {
                await this.$store.dispatch('category/updateCategory', this.category).then((result) => {
                    console.table('AD:', result);
                }).catch((err) => { });
            },
            changedImage(event) {
                this.category.image = event.target.files[0];
            }
        },
        created() {
            this.getCategory(this.id);
        }
    }
</script>

<style lang="scss" scoped>

</style>