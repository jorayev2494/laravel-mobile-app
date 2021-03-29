<template>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="/admin/images/logo.svg" alt="logo">
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3" @submit.prevent="login($event)">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" v-model="email" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" v-model="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="mt-3">
                                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    href="../../index.html">SIGN IN</a> -->
                                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="login">
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Keep me signed in
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>
                            <div class="mb-2">
                                <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                    <i class="ti-facebook mr-2"></i>Connect using facebook
                                </button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="register.html" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: 'admin1@gmail.com',
                password: 'secret123_!'
            }
        },
        methods: {
            login(event) {
                this.$store.dispatch('authorize/jwtLogin', { email: this.email, password: this.password }).then((result) => {
                    if (result) this.$router.push({ name: 'dashboard' });
                }).catch((err) => {
                    console.log('err: ', err.response);
                });
            }
        },
    }

</script>

<style lang="scss" scoped>

</style>
