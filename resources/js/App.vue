<template>
  <div class="container">
    <br/>
   <center>
      <span class="text-danger"
        ><h4>Laravel SPA with Vue , Auth (Sanctum), CURD Example</h4></span
      >
    </center>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <!-- for logged-in user-->
        <div class="navbar-nav" v-if="isLoggedIn === 'true'">
          <router-link to="/allproduct" class="nav-item nav-link"
            >產品清單</router-link
          >
          <router-link to="/createproduct" class="nav-item nav-link"
            >建立產品</router-link
          >

          <router-link to="/about" class="nav-item nav-link"
            >使用者資料</router-link
          >
    <button type="button" class="btn btn-danger" @click="logout">登出</button>
        </div>
        <!-- for non-logged user-->
        <div class="navbar-nav" v-else>
          <router-link to="/home" class="nav-item nav-link">Home</router-link>
          <router-link to="/login" class="nav-item nav-link">login</router-link>
          <router-link to="/register" class="nav-item nav-link">register</router-link>
        </div>
      </div>
    </nav>
    <br />
    <router-view @singin="singin" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLoggedIn: "false",
    };
  },
  created() {
    if (window.localStorage.getItem("auth") === "true") {
      this.isLoggedIn = "true";
    }
  },
  //     computed: {
  //   isLoggedIn() {
  //     return localStorage.getItem("auth");
  //   }
  // },
  methods: {
    logout() {
      axios
        .post("api/logout")
        .then((response) => {
          // localStorage.removeItem("auth");
          localStorage.removeItem("token");
          localStorage.removeItem("auth");
          localStorage.removeItem("email");
           document.cookie = `token=`;  
          this.isLoggedIn = "false";
          this.$router.push("/login");
        })
        .catch((error) => {
          console.log(error);
        });
    },
 
    singin(para) {
      this.isLoggedIn = para;
    },
    handleStorageChange () {
      // axios.post(`/api/remove_password/${localStorage.getItem("email")}`).then((response) => {
      // console.log(response.data);
      localStorage.clear();
      this.isLoggedIn = "false";
      this.$router.push('/login');    
    // });
    },
  },
   ready () {
    window.addEventListener('storage', this.handleStorageChange);
  },
  beforeDestroy () {
    window.removeEventListener('storage', this.handleStorageChange);
  },
  mounted () {
    window.addEventListener('storage', this.handleStorageChange);
  }
};
</script>