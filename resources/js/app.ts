import './bootstrap';

import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import App from './App.vue';
import { AppPreset } from "./AppPreset"
import router from './router';
import { ToastService } from "primevue";


const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: AppPreset,
        options: {
            darkMode: true,
            darkModeSelector: '.my-app-dark'
        }
    }
});
app.use(router);
app.use(ToastService);
app.mount('#app');
