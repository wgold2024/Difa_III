<template>
    <RouterView />
</template>

<script lang="ts" setup>
import MainLayout from "@/Layouts/MainLayout.vue";

    let a: string = 'Test TS 2'
    let arr: Array<string> = ['Test TS 2', '2']

    type Obj = {
        name: string,
        age: number
    }
    let obj: Obj = {
        name: 'Petr',
        age: 25
    }
</script>

<style scoped>

</style>
