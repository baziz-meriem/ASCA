import {createRouter, createWebHistory}  from 'vue-router'
import auth from './Components/Authentication/auth.js'

const routes = [
    {
        path:'/',
        name:'Home',
        component:()=>import('./Components/Home.vue'),
        //children:[{},{}],

        beforeEnter(to,from,next) { //route accessible only if logged in
            if(! auth.isLoggedIn()) {
               next('/SignIn');
            } else {
                next('/Home')
            }
        }
    }
    ,
    {
        path:'/Register',
        name:'Register',
        component:()=>import('./Components/Authentication/Register.vue')
    },
    {
        path:'/Welcome',
        name:'Welcome',
        component:()=>import('./Components/Welcome.vue')
    },
    {
        path:'/SignIn',
        name:'SignIn',
        component:()=>import('./Components/Authentication/SignIn.vue')
    },
    {
        path:'/ResetPassword',
        name:'ResetPassword',
        component:()=>import('./Components/Authentication/ResetPassword.vue')
    }

]

const router = createRouter({
    history:createWebHistory(),
    routes
});


export default router
