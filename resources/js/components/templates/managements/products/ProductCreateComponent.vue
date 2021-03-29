<template>
    <div class="col-12 grid-margin">
        <div class="card" v-cloak>
            <div class="card-body">
                <h4 class="card-title">Редактировать продукт</h4>

                <div class="row">
                    <div class="col-md-2" v-for="(image, index) in product.images" :key="index" style="margin: 2%, 5%, 0, 0;">
                        <img :src="showImage(image)" :alt="showImage(image)" height="100">
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <label>Загрузить изображении</label>
                    <!-- <input type="file" id="images" name="images[]" class="file-upload-default" multiple @change="imagesSelected($event)" accept="image/png, image/jpeg" /> -->
                    <input type="file" id="images" name="images[]" multiple @change="imagesSelected($event)" accept="image/png, image/jpeg" required />
                    
                    <!-- <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Загрузить</button>
                        </span>
                    </div> -->
                </div>

                <hr>

                <form class="form-sample" ref="form" @submit.prevent="createProduct($event)">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Называние</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" v-model="product.title" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Цена</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" v-model="product.price" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Категории</label>
                                <div class="col-sm-9">
                                    <select class="form-control" v-model="product.category_id">
                                        <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                            {{ category.slug }}
                                        </option>                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Акционная цена</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" v-model="product.sale_price" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Активный</label>
                                <div class="col-sm-9">
                                    <select class="form-control" v-model="product.is_active">
                                        <option :value="true">Активный</option>
                                        <option :value="false">Не активный</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="exampleTextarea1">Описания</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" v-model="product.description"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {
                    category_id: 0
                },
                categories: [],
                uploadedFiles: false,
                selectedImages: []
            }
        },
        methods: {
            async loadCategories() {
                await this.$store.dispatch('category/loadCategories').then((result) => {
                    this.categories = result;
                }).catch((err) => { });
            },
            async createProduct(event) {
                await this.$store.dispatch('product/createProduct', this.sendServerData());
            },
            showImage: (image) => image.path == null ? image.blob : `${ image.path }/${ image.name }`,
            imagesSelected: function(event) {
                this.uploadedFiles = true;
                this.selectedImages = event.target.files;

                this.product.images = [];
                for (const key in this.selectedImages) {
                    if (this.selectedImages.hasOwnProperty(key)) {
                        const img = this.selectedImages[key];
                        // show images
                        this.product.images.push({
                            path: null,
                            blob: URL.createObjectURL(img)
                        });
                    }
                }
            },

            sendServerData: function() {
                const data = new FormData();
                
                // Image selected
                if (this.uploadedFiles) {
                    for (const index in this.selectedImages) {
                        if (this.selectedImages.hasOwnProperty(index)) {
                            const img = this.selectedImages[index];
                            data.append('images[]', img);
                        }
                    }
                }

                // Set prudyct properties
                for (const property in this.product) {
                    if (this.product.hasOwnProperty(property)) {
                        const value = this.product[property];
                        if (typeof value == 'object') continue;
                        data.set(property, value);
                    }
                }

                return data;
            }
        },
        created() {
            this.loadCategories();
        }
    }
</script>

<style scoped>
    img {
        border-radius: 10px;
    }
</style>