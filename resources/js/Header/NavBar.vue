<template>
    <div class="flex justify-between px-20 py-5 items-center">
   
           <div> LOGO </div>
    <div class="flex gap-8 items-center">
        <router-link to='/'>Acceuil</router-link>
        <router-link to='/about'>A propos</router-link>
        <router-link to='/NoServices'>Nos Services</router-link>

        <router-link to='/SignIn'><button class="text-sm text-orangeColor dark:text-orangeColor border-2 rounded-md border-orangeColor px-5 py-2 "> Se connecter</button> </router-link>
        <router-link to='/Register'> <button class="text-sm text-orangeColor dark:text-orangeColor border-2 rounded-md border-orangeColor px-5 py-2 ">S'inscrire </button> </router-link>


        
        
        
    </div>
</div>
</template>