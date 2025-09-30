import { createWebHistory, createRouter } from 'vue-router'

import MainPage from "@/Pages/MainPage.vue";
import LoginPage from "@/Pages/Auth/LoginPage.vue";
import RegisterPage from "@/Pages/Auth/RegisterPage.vue";
import ClassifierPage from "@/Pages/ClassifierPage.vue";
import StatisticsPage from "@/Pages/StatisticsPage.vue";
import HomePage from "@/Pages/Auth/HomePage.vue";
import ActTabsPage from "@/Pages/TabsPage.vue";
import AiPage from "@/Pages/AiPage.vue";
import AdminPage from "@/Pages/AdminPage.vue";

import useAuth from '@/composables/useAuth.js'

const { authenticated, attempt, setAuthenticated, setUser } = useAuth();

const routes = [
    {
        name: 'login',
        path: '/login',
        component: LoginPage,
        meta: { requiresAuth: false } // не требует аутентификации
    },
    {
        name: 'register',
        path: '/register',
        component: RegisterPage,
        meta: { requiresAuth: false }
    },
    {
        name: 'home',
        path: '/home',
        component: HomePage,
        meta: { requiresAuth: false }
    },
    {
        name: 'main',
        path: '/',
        component: MainPage,
        meta: { requiresAuth: true },
        children: [
            {
                name: 'classifier',
                path: '/classifier',
                component: ClassifierPage,
                meta: { requiresAuth: true }
            },
            {
                name: 'act-tabs',
                path: '/act-tabs/:id?',
                component: ActTabsPage,
                meta: { requiresAuth: true }
            },
            {
                name: 'statistics',
                path: '/statistics',
                component: StatisticsPage,
                meta: { requiresAuth: true }
            },
            {
                name: 'ai',
                path: '/ai',
                component: AiPage,
                meta: { requiresAuth: true }
            },
            {
                name: 'admin',
                path: '/admin',
                component: AdminPage,
                meta: { requiresAuth: true }
            },
        ]
    },
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
})

router.beforeEach((to, from, next) => {
    // Публичные маршруты, доступные без аутентификации
    if (to.meta.requiresAuth === false) {
        return next()
    }

    attempt()
        .then(res => {
            if (authenticated.value) {
                if (to.name === 'main') {               // Убрать если не нужно перенаправление на классификатор после входа
                    return next({ name: 'classifier' })
                }
                return next()
            } else {
                return next({ name: 'login' })
            }
        })
        .catch(e => {
            if (e.response?.status === 401) {
                setAuthenticated(false)
                setUser(null)
            }

            return next({ name: 'login' })
        })
})

export default router
