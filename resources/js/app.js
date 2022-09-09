import './bootstrap';
import '../css/app.css'; 
import { createApp } from 'vue';
import 'flowbite';//Register and login form


import App from './App.vue'
import router from "./router";

createApp(App).use(router).mount('#app')


