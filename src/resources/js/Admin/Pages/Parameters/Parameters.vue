<script setup>
import { Head, Link } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';

const props = defineProps({
  parameters: { type: Array, required: [] },
});
</script>

<template>
  <Head title="Параметры" />

  <AdminLayout header-title="Список параметров">
    <div class="flex justify-between py-3">
      <div>

      </div>
      <div>

      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="parameter in parameters"
        class="flex flex-row hover:bg-gray-50 items-center"
      >
        <template v-if="parameter.path_name">
          <Link
            :href="route(parameter.path_name)"
            :key="parameter.id"
            class="flex-1 block py-2 px-4"
          >
            {{ parameter.name }}
          </Link>
        </template>
        <template v-else>
          <div
            :key="parameter.id"
            class="flex-1 block py-4 px-4 text-gray-900 bg-gray-50 font-bold"
          >
            {{ parameter.name }}
          </div>
        </template>

      </div>
    </div>
  </AdminLayout>
</template>

<style scoped>

</style>
