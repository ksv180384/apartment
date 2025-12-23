<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import CardProperty from '@/Admin/Components/CardProperty.vue';
import FlashMessages from "@/Components/FlashMessages.vue";

const { properties } = defineProps({
  properties: { type: Array, default: [] },
});

const deleteItem = (id) => {
  router.delete(route('admin.properties.destroy', { id: id }), {
    onSuccess: () => {
      ElMessage.success('Недвижимость успешно удалена.');
    },
    onError: (errors) => {
      ElMessage.error('Ошибка при удалении.');
    }
  });
}
</script>

<template>
  <Head title="Список назначений" />

  <AdminLayout header-title="Список назначений">

    <div class="flex justify-between py-3">
      <div>

      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.properties.create')">
            Добавить недвижимость
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex flex-row flex-wrap justify-center px-4 gap-4">
      <template v-for="property in properties" :key="property.id">

        <CardProperty :property="property" />

      </template>
    </div>
  </AdminLayout>
</template>

<style scoped>

</style>

