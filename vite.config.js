import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
      buildDirectory: 'build',
    }),
  ],
  build: {
    outDir: 'public/build',
    emptyOutDir: true,
    rollupOptions: {
      input: ['resources/js/app.js', 'resources/css/app.css'],
    },
  },
});
