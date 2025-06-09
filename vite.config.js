import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import { resolve } from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],
    // resolve: {
    //     alias: {
    //         '@': resolve(__dirname, './resources/js'),
    //         // или '@': resolve(__dirname, './resources'),
    //     }
    // }
    // build: {
    //     rollupOptions: {
    //         output: {
    //             entryFileNames: 'js/[name].js',
    //             chunkFileNames: 'js/[name].js',
    //             assetFileNames: 'assets/[name][extname]'
    //         }
    //     }
    // }

});
