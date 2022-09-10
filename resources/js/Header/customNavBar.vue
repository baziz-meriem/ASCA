<template>
    <div class="flex justify-between px-20 py-5 items-center">
   
        <div class="flex gap-8 items-center">
           <router-link to="/"> <div> LOGO </div> </router-link>
           <router-link to="/Signaler"> <button  class="text-sm text-orangeColor dark:text-orangeColor border-2 rounded-md border-orangeColor px-5 py-2 ">Signaler</button></router-link>
           <router-link to="/Contribuer/:id?"> <button class="text-sm text-yellowColor dark:text-primcolor border-2 rounded-md border-yellowColor px-5 py-2 ">Contribuer</button></router-link>
        </div>
    
    <div class="flex gap-8 items-center">
        <router-link to='/CitizenHome'>Accueil</router-link>
        <router-link to='/CitizenHome'>Suivi</router-link>
        <router-link to='/CitizenHome'>Evenements</router-link>
        <router-link to='/CitizenHome'><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg></router-link>
        <router-link to='/CitizenHome'>
           <img src="https://picsum.photos/seed/picsum/700/800" 
            class="  h-11 w-11 border-4 rounded-full border-secondcolor object-cover " /> 
            
        </router-link>
        <button  @click="logout"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg></button>
    </div>
</div>
</template>
<script>
    import auth from '../Components/Authentication/auth'
    export default {
     methods:{
       async logout() {
           await auth.logout();
            this.$router.push('/');
       }
     }
    }
   </script>