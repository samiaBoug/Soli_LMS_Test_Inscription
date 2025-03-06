import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';


import { createApp } from 'vue';
import App from './App.vue';
import i18n from './i18n.js';
import router from './router.js' ;


createApp(App)
   
    .use(router)
    .use(i18n)
    .mount('#app')