import './bootstrap';
import '../css/app.css'; 
import { createApp } from 'vue';
import App from './App.vue'
import router from './router';
//vuelidate for form validation
import Vuelidate from "vuelidate";
//date picker
import Datepicker from "@vuepic/vue-datepicker";
//import date picker styles
import "@vuepic/vue-datepicker/dist/main.css";
//sweetAlert for alerts
import VueSweetalert2 from "vue-sweetalert2";
//import sweetAlert styles
import "sweetalert2/dist/sweetalert2.min.css";
// Using Apline for dynamic forms
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();


// Creating the Vue APP
//const app = createApp({});

//app.component("Datepicker", Datepicker);

// Using the router By the App
createApp(App).use(VueSweetalert2).use(Vuelidate).use(router).mount("#app");

//using vue validator package
/*app.use(Vuelidate);

//using sweetAlert
app.use(VueSweetalert2);*/

// Rendring the Vue APP


