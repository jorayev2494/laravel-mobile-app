<template>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Добавить категорию</h4>
            <!-- <p class="card-description">
                Basic form layout
            </p> -->
            <form class="forms-sample" @submit.prevent="createCategory($event)">
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
            <pre>{{ $data }}</pre>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                category: {}
            }
        },
        methods: {
            createCategory(event) {
                console.log(this.category);
                this.$store.dispatch('category/createCategory', this.category);
            },
            changedImage(event) {
                this.category.image = event.target.files[0];
            }
        },
    }
    
</script>

<style lang="scss" scoped>

</style>