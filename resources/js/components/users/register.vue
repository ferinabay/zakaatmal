<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Register</div>

                    <div class="card-body">

                        <form @submit.prevent="PostRegister">

                            <div class="form-group">
                                <label>name</label>
                                <input type="text" class="form-control" v-model="user.name"
                                       placeholder="Masukkan nama">
                                <div v-if="validation.name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.name[0] }}
                                    </div>
                                </div>
                            </div>
                       <div class="form-group">
                                <label>email</label>
                                <input type="text" class="form-control" v-model="user.email"
                                       placeholder="Masukkan email">
                                <div v-if="validation.email">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.email[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="text" class="form-control" v-model="user.password"
                                       placeholder="Masukkan Password">
                                <div v-if="validation.password">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.password[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-danger">RESET</button>
                            </div>
                        </form>
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
                user: {},
                validation: []
            }
        },
        methods: {
            PostRegister() {
                let uri = 'http://127.0.0.1:8000/api/register';
                this.axios.post(uri, this.user)
                    .then((response) => {
                        localStorage.setItem("token", response.data.meta.token)
                        console.log(response)
                        this.$router.push({
                            name: 'users'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.data;
                });
            }
        }
    }
</script>