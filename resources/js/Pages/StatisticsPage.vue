<template>
    <div>
        Страница "Статистика"
        {{ user }}
    </div>
</template>

<script lang="ts" setup>
import useAuth from '@/composables/useAuth.js'
const { authenticated, user, setAuthenticated, setUser } = useAuth();

</script>


<style scoped>

</style>

