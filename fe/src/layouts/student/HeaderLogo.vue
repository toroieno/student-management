<template>
  <div class="container">
    <v-row>
      <v-col
        cols="12"
        md="8"
        sm="12"
      >
        <div class="top-logo">
          <a href="https://sami.hust.edu.vn/hoc-tap/" id="branding">
            <img src="https://sami.hust.edu.vn/hoc-tap/wp-content/plugins/samiweb/img/sami_branding.png" style="max-width: 100%;" alt="Viện Toán ứng dụng và Tin học Bách Khoa">
          </a>
        </div>
      </v-col>
      <v-col
        cols="12"
        md="2"
      >

      </v-col>
      <v-col
        cols="12"
        md="2"
        sm="12"
      >
        <div class="top-user">
          <v-btn @click="logout">Đăng xuất</v-btn>
        </div>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  methods: {
    logout() {
      localStorage.setItem('authenticated', 'false')
      location.href = `${location.origin}/login`
    }
  }  
}
</script>

<style scoped>
.container {
  background-color: #015a8f;
  margin-top: 20px;
}
.top-logo {

}
.top-user {
  
}
</style>