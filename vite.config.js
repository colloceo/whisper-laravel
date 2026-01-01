import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        VitePWA({
            registerType: 'autoUpdate',
            outDir: 'public/build',
            manifest: {
                name: 'Whispr Platform',
                short_name: 'Whispr',
                description: 'A modern platform for whisper-quiet communication.',
                theme_color: '#ffffff',
                icons: [
                    {
                        src: '/images/icons/icon-192x192.svg',
                        sizes: '192x192',
                        type: 'image/svg+xml'
                    },
                    {
                        src: '/images/icons/icon-512x512.svg',
                        sizes: '512x512',
                        type: 'image/svg+xml'
                    }
                ]
            },
            workbox: {
                navigateFallback: null, // Laravel handles navigation
                cleanupOutdatedCaches: true
            }
        })
    ],
});
