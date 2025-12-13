import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import AutoImport from 'unplugin-auto-import/vite';
import Components from 'unplugin-vue-components/vite';
import { ElementPlusResolver } from 'unplugin-vue-components/resolvers';
import tailwindcss from '@tailwindcss/vite'
import { fileURLToPath, URL } from "node:url";

export default defineConfig(({ command, mode }) => {
  const isAdminBuild = process.argv.includes('admin.js');

  return {
    server: {
      host: '0.0.0.0',
      port: 5173,
      hmr: {
        host: 'localhost',
      },
    },
    plugins: [
      laravel({
        input: [
          'resources/js/app.js',
          'resources/js/admin.js',
          'resources/css/app.css',
        ],
        refresh: true,
      }),
      vue({
        template: {
          transformAssetUrls: {
            base: null,
            includeAbsolute: false,
          },
        },
      }),
      tailwindcss(),
      ...(isAdminBuild ? [
        AutoImport({
          resolvers: [ElementPlusResolver()],
        }),
        Components({
          resolvers: [ElementPlusResolver()],
        }),
      ] : []),
    ],
    resolve: {
      alias: {
        // vue: 'vue/dist/vue.esm-bundler.js',
        '@': fileURLToPath(new URL('./resources/js', import.meta.url)),
      },
    },
  }
});
