<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">hitung zakat</div>

                    <div class="card-body">

                        <form @submit.prevent="PostHitung">

                       <div class="form-group">
                                <label>masukan jumlah total_harta</label>
                                <input type="text" class="form-control" v-model="zakatmal.total_harta"
                                       placeholder="Masukkan jumlah harta">
                             
                            </div>
                            <div class="form-group">
                                <label>masukan jumlah total_hutang</label>
                                <input type="text" class="form-control" v-model="zakatmal.total_hutang"
                                       placeholder="Masukkan total hutang">
                           
                            </div>
                              <div class="form-group">
                                <label>hasil </label>
                                <input type="text" class="form-control" v-model="zakatmal.hasil"
                                       placeholder="hasil">
                             
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
                zakatmal: {},
                validation: []
            }
        },
        methods: {
            PostHitung() {
                let uri = 'http://127.0.0.1:8000/api/zakatmal';
                this.axios.post(uri, {headers: { 'Authorization' : 'Bearer '+ 'token'}},this.zakatmal)
                    .then((response) => {
                        
                        console.log(response)
                        this.$router.push({
                            name: 'zakatmal'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.data;
                });
            }
        }
    }
</script>