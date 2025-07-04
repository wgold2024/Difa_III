<template>
    <div class="m-mobile_hide items-start w-full px-1 py-10">
        <div class="flex justify-center mb-10">
            <Button type="submit" @click="startTrain" label="Запустить обучение" />
        </div>
    </div>
</template>

<script lang="ts" setup>
import Button from "primevue/button";
import axios from "axios";
const startTrain = () => {
    axios.post('/api/ai-train')
        .then(res => {
            console.log(res);
        })
}

</script>

<style scoped>

</style>

