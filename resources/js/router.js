import {createRouter, createWebHistory}  from 'vue-router'

const routes = [
    {
        path:'/',
        name:'register',
        component:()=>import('./Components/Authentication/register.vue')
    }
    ,
    {
        path:'/home',
        name:'Home',
        component:()=>import('./Components/home.vue')
    },
    {
        path:'/Sign_in',
        name:'Sign_in',
        component:()=>import('./Components/Authentication/Sign_in.vue')
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
})

export default router
