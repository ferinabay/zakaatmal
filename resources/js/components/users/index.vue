<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">tugas framework laravel</div>
          <div class="card-body">
            <router-link :to="{ name: 'register' }" class="btn btn-md btn-success">Register</router-link>
            <router-link :to="{ name: 'create' }" class="btn btn-md btn-success">Login</router-link>
            <router-link :to="{ name: 'hitungZakat' }" class="btn btn-md btn-success">Hitung Zakat</router-link>

            <div class="table-responsive mt-2">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>name</th>
                    <th>email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(me, index) in user" :key="me.id">
                    <td>{{ me.id }}</td>
                    <td>{{ me.name }}</td>
                    <td>{{ me.email }}</td>
                    <td>{{ me.joined }}</td>//
                    <td class="text-center">
                      //
                      <router-link
                        :to="{name: 'edit', params: { id: login.id }}"
                        class="btn btn-sm btn-primary"
                      >EDIT</router-link>//
                      <button
                        @click.prevent="PostDelete(login.id, index)"
                        class="btn btn-sm btn-danger"
                      >HAPUS</button>
                      //
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
      users: []
    }
  },
  created() {
    let uri = `http://127.0.0.1:8000/api/me`;
    const config = { headers: { Authorization: "Bearer " + window.localStorage.getItem('token'), "Accept": "application/json" } }
    this.axios.get(uri, config).then(response => {
      console.log(response)
      this.users = response.data.data;
    });
  }
} 
</script>
