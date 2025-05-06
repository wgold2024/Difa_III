<template>
    <div class="m-container">
        <header class="m-header">
            <Header />
        </header>

        <main class="m-main">
            <slot />
        </main>

        <footer class="m-footer">
            <Footer />
        </footer>
    </div>
</template>


<script setup lang="ts">
import Footer from "@/Layouts/Footer.vue";
import Header from "@/Layouts/Header.vue";

</script>


<style scoped>
.m-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
}

.m-header {
    flex: 1;
    box-shadow: 0px 3px 5px rgba(0,0,0,.02), 0px 0px 2px rgba(0,0,0,.05), 0px 1px 4px rgba(0,0,0,.08);
}

.m-main {
    display: flex;
    flex: 15;
}

.m-footer {
    flex: 1;
    box-shadow: 0px -3px 5px rgba(0,0,0,.02), 0px -0px 2px rgba(0,0,0,.05), 0px -1px 4px rgba(0,0,0,.08);
}
</style>
