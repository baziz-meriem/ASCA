<template>
    here welcome page
    <button class="bg-red-100" @click="logout">Logout</button>
</template>
<script>
    import auth from './Authentication/auth.js'
    export default {
     methods:{
       async logout() {
           await auth.logout();
            this.$router.push('/SignIn');
       }
     }
    }
   </script>