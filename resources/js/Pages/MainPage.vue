<template>
    <MainLayout>
        <RouterView />
    </MainLayout>

    <div class="border border-red-900 p-4">MainPage</div>
    <div class="my-card">
        <InputText class="mr-1"></InputText>
        <Button class="mr-2">Test button</Button>
        <Button label="Toggle Dark Mode" @click="toggleDarkMode" />
    </div>
    <div>
        <i class="pi pi-check">df</i>
        <i class="pi pi-times"></i>
        <span class="pi pi-search"></span>
        <span class="pi pi-user"></span>
        <i class="pi pi-check" style="font-size: 1rem"></i>
        <i class="pi pi-times" style="font-size: 1.5rem"></i>
        <i class="pi pi-search" style="font-size: 2rem"></i>
        <i class="pi pi-user" style="font-size: 2.5rem"></i>
        <i class="pi pi-check" style="color: slateblue"></i>
        <i class="pi pi-times" style="color: green"></i>
        <i class="pi pi-search" style="color: 'var(--p-primary-color)'"></i>
        <i class="pi pi-user" style="color: #708090"></i>
        <i class="pi pi-spin pi-spinner" style="font-size: 2rem"></i>
        <i class="pi pi-spin pi-cog" style="font-size: 2rem"></i>
    </div>


</template>

<script lang="ts" setup>
import Button from "primevue/button"
import InputText from 'primevue/inputtext';
import MainLayout from "@/Layouts/MainLayout.vue";

function toggleDarkMode() {
    document.documentElement.classList.toggle('my-app-dark')
}


</script>

<style scoped>

</style>

