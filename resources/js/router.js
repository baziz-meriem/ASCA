import {createRouter, createWebHistory}  from 'vue-router'
import auth from './Components/Authentication/auth.js'

const routes = [
    {
        path:'/Home',
        component:()=>import('./Pages/CitizenHome.vue'),
        //children:[{},{}],

        beforeEnter(to,from,next) { //route accessible only if logged in
            if(!auth.isLoggedIn()) {
               next('/SignIn');//if the user is not logged in
            } else {
                next('/citizenHome')
            }
        }
    }
    ,
    {
        path:'/',
        name:'HomePage',
        component:()=>import('./Pages/Home.vue')
    },
    {
        path:'/Register',
        name:'Register',
        component:()=>import('./Components/Authentication/Register.vue')
    },
    {
        path:'/citizenHome',
        name:'CitizenHome',
        component:()=>import('./Pages/CitizenHome.vue'),
    },
    {
        path:'/SignIn',
        name:'SignIn',
        component:()=>import('./Components/Authentication/SignIn.vue'),
        beforeEnter(to,from,next) { //route accessible only if logged in
            if(!auth.isLoggedIn()) {
               next();
            } else {
                next('/citizenHome')
            }
        }
    },
    {
        path:'/ResetPassword',
        name:'ResetPassword',
        component:()=>import('./Components/Authentication/ResetPassword.vue')
    }

]

const router = createRouter({
    history: createWebHistory(),//for url form
    routes:routes,
    linkActiveClass:'active'
});


export default router
