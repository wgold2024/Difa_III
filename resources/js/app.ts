import './bootstrap';

import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import App from './App.vue';
import { AppPreset } from "./AppPreset"
import router from './router';
import { ToastService } from "primevue";
import ConfirmationService from 'primevue/confirmationservice';


const currentPath = window.location.pathname;
if (currentPath.startsWith('/api/') ||
    currentPath.startsWith('/sanctum/') ||
    currentPath.startsWith('/test') ||
    currentPath.startsWith('/session-info')) {

    console.log('API route detected, skipping Vue initialization');
    // Останавливаем выполнение для API routes

} else {
    const app = createApp(App);
    app.use(PrimeVue, {
        theme: {
            preset: AppPreset,
            options: {
                darkMode: true,
                darkModeSelector: '.my-app-dark'
            }
        },
        locale: {
            firstDayOfWeek: 1,
            dayNames: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
            dayNamesShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            today: 'Сегодня',
            clear: 'Очистить',
            dateFormat: 'mm/dd/yy',
            weekHeader: 'Нед',
        }
    });
    app.use(router);
    app.use(ToastService);
    app.use(ConfirmationService);
    app.directive('lazy', {
        mounted(el) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        el.src = el.dataset.src;
                        observer.unobserve(el);
                    }
                });
            });
            observer.observe(el);
        }
    });
    app.mount('#app');
}


