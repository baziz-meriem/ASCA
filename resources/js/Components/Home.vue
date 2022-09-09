<template>
    here home
    <button @click="logout">Logout</button>
</template>
<script>
    import auth from './Components/Authentication/auth.js'
    export default {
     methods:{
       async logout() {
            auth.logout();
            this.$route.push('/SignIn');
       }
     }
    }
   </script>