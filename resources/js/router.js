import {createRouter, createWebHistory}  from 'vue-router'
import auth from './services/auth'


// Import Pages
import Home from "./Pages/Home/Home.vue";
import About from "./Pages/Home/About.vue";
import NoServices from "./Pages/Home/NoServices.vue";
import Contact from "./Pages/Home/Contact.vue";
import CitizenHome from "./Pages/User/Citizen/CitizenHome.vue";
import Adherer from "./Pages/User/Adherer.vue";
import Signaler from "./Pages/User/Signaler.vue";
import Contribuer from "./Pages/User/Contribuer.vue";
import Profile from "./Pages/Profile.vue";

import SignIn from "./Pages/Authentication/SignIn.vue";
import Register from "./Pages/Authentication/Register.vue";
//Dashboard Pages
import SignalementsPage from "./Pages/Dashboard/SignalementsPage.vue";
import ContributionsPage from "./Pages/Dashboard/ContributionsPage.vue";
import AdhesionsPage from "./Pages/Dashboard/AdhesionsPage.vue";
import AdhesionPreviewPage from "./Pages/Dashboard/AdhesionPreviewPage.vue";
import ContributionPreviewPage from "./Pages/Dashboard/ContributionPreviewPage.vue";
import SignalementPreviewPage from "./Pages/Dashboard/SignalementPreviewPage.vue";
import CitoyenPage from "./Pages/Dashboard/CitoyenPage.vue";
import PartenairePage from "./Pages/Dashboard/PartenairePage.vue";

import UserSignalementDetails from "./Pages/User/UserSignalementDetails.vue";



import EditSignalement from "./Pages/User/EditSignalement.vue";
import UserStats from "./Pages/User/UserStats.vue";


const routes = [
    {
        path:'/Home',
        component:Home,
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
        component:Home
    },
    {
        path:'/Register',
        name:'Register',
        component:Register
    },
    {
        path:'/citizenHome',
        name:'CitizenHome',
        component:CitizenHome,
    },
    {
        path:'/SignIn',
        name:'SignIn',
        component:SignIn,
        beforeEnter(to,from,next) { //route accessible only if logged in
            if(!auth.isLoggedIn()) {
               next();
            } else {
                next('/citizenHome')
            }
        }
    },
    { path: "/about", component: About },
    { path: "/contact", component: Contact },
    { path: "/NoServices", component: NoServices },
    { path: "/Citizen", component: CitizenHome },

    { path: "/Adherer", component: Adherer },
    { path: "/Signaler", component: Signaler },
    { path: "/Contribuer/:id?", component: Contribuer },

    { path: "/dashboard/signalements", component: SignalementsPage },
    { path: "/dashboard/contributions", component: ContributionsPage },
    { path: "/dashboard/adhesions", component: AdhesionsPage },

    {
        path: "/dashboard/SignalementPreview/:id",
        component: SignalementPreviewPage,
    },
    { path: "/dashboard/AdhesionPreview/:id?", component: AdhesionPreviewPage },
    {
        path: "/dashboard/ContributionPreview/:id",
        component: ContributionPreviewPage,
    },

    { path: "/dashboard/citoyen", component: CitoyenPage },
    { path: "/dashboard/partenaire", component: PartenairePage },
    { path: "/Profile", component: Profile },
    { path: "/Citizen/signalements/:id", component: UserSignalementDetails },
    {
        path: "/Citizen/Editsignalements/:id",
        component: EditSignalement,
    },
    { path: "/dashboard/User-stats/:id", component: UserStats },
    {
        path:'/ResetPassword',
        name:'ResetPassword',
        component:()=>import('./Components/Authentication/ResetPassword.vue')
    }

]

const router = createRouter({
    history: createWebHistory(), 
    routes:routes,
    linkActiveClass:'active'
});


export default router
