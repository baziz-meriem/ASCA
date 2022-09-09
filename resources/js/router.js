import {createRouter, createWebHistory}  from 'vue-router'

const routes = [
    {
        path:'/',
        name:'Home',
        component:()=>import('./Components/Home.vue')
    }
    ,
    {
        path:'/Register',
        name:'Register',
        component:()=>import('./Components/Authentication/Register.vue')
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router
