<template>
    <div class="flex justify-between  h-full" style="min-width: 320px">
        <div class="flex items-center px-4 py-0 h-full" >
            <img src="../img/novomet-logo.png" alt="logo" class="m-mobile_logo h-1/2 mr-4"/>

            <router-link to="/classifier" class="m-mobile_hide mr-3">
                <Button label="Классификатор" icon="pi pi-th-large" outlined />
            </router-link>

            <router-link to="/statistics" class="m-mobile_hide mr-3">
                <Button label="Стат. анализ" icon="pi pi-chart-bar" outlined />
            </router-link>

<!--            <Button label="/api/user" @click="apiUser" outlined />-->
        </div>


        <div class="flex items-center px-4 py-0 h-full">
            <router-link  v-if="user !== null && user.id === 1" to="/ai" class="m-mobile_hide mr-3">
                <Button  icon="pi pi-microchip-ai" outlined class="m-mobile_font mr-3"/>
            </router-link>

            <router-link to="/admin" class="m-mobile_hide mr-3">
                <Button  icon="pi pi-key" outlined class="m-mobile_font mr-3"/>
            </router-link>

            <Button  label="Скачать д/планшета" @click="getApk()" icon="pi pi-android" outlined class="m-mobile_font mr-3"/>
            <Button  label="Info" icon="pi pi-info-circle" outlined class="m-mobile_hide mr-3" />

            <div v-if="authenticated" class="m-mobile_hide mr-8">{{ user !== null ? user.name : '' }}</div>

            <button @click="onLogout()" class="cursor-pointer">
                <i class="pi pi-sign-out"></i>
            </button>
        </div>
    </div>
</template>


<script setup lang="ts">
import Button from "primevue/button";
import axios from "axios";
import useAuth from "@/composables/useAuth";

import { useRouter } from "vue-router";
const router = useRouter();

const { authenticated, user } = useAuth()

const onLogout = () => {
    axios.post('/logout')
        .then( res => {
            router.push({ name: 'login' })
        })
        .catch(e => {
            return e;
        });
};

const getApk = () => {
    let  date = new Date().getTime();

    axios.get(`/api/get-apk/?t=${date}`, {
        responseType: 'blob'
    })
        .then((response) => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'apk.7z'); // имя файла для скачивания
            document.body.appendChild(link);
            link.click();
            link.remove();
        })
        .catch((error) => {
            console.log('Ошибка при скачивании файла:', error);
        });
}

</script>


<style scoped>
.p-button-outlined {
    height: 45px ;
    border-color: #0071CE !important;
    color: #0071CE !important;
    outline-color: var(--primary-500) !important;
}

.p-button-outlined:hover {
    background-color: var(--primary-50) !important;
}

.p-button-outlined:focus {
    outline: 2px solid var(--primary-200) !important;
    outline-offset: 2px;
}

@media (max-width: 600px) {
    .m-mobile_hide {
        display: none;
    }
    .m-mobile_logo {
        height: 40%;
    }
    .m-mobile_font {
        font-size: 9px;
        height: 75%;
    }
}

</style>
