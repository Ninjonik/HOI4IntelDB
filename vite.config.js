import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/member_chart.js',
                'resources/js/staff_chat.js',
                'resources/js/lobby.js',
            ],
            refresh: true,
        }),
    ],
});
