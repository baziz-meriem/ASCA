import {createRouter, createWebHistory}  from 'vue-router'

const routes = [
    {
        path:'/',
        name:'Home',
        component:()=>import('./Components/Home.vue')
    }
    ,
    {
        path:'/Welcome',
        name:'Welcome',
        component:()=>import('./Components/Welcome.vue')
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router
