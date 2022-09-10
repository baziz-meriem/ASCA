<template>
    <div id="app">
      <router-link to="/SignIn" class="px-12">Sign in</router-link>
      <button class="bg-red-100" @click="logout">Logout</button>
    </div>
    <router-view></router-view>
  </template>

<script>
  import auth from './Components/Authentication/auth.js'
  export default {
   methods:{
     async logout() {
         await auth.logout();
          this.$router.push('/');
     }
   }
  }
 </script>
