<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { Delete } from '@element-plus/icons-vue';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import Pagination from '@/Components/Pagination.vue';

defineProps({
  propertyTypes: { type: Array, required: [] },
  pagination: { type: Object, required: true },
});

const deleteItem = (id) => {
  router.delete(route('admin.property_types.destroy', { id: id }), {
    onSuccess: () => {
      ElMessage.success('Вид недвижимости успешно удалена.');
    },
    onError: (errors) => {
      ElMessage.error('Ошибка при удалении.');
    }
  });
}
</script>

<template>
  <Head title="Категории" />

  <AdminLayout header-title="Список видов недвижимости">
    <div class="flex justify-between py-3">
      <div>

      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.property_types.create')">
            Добавить вид недвижимости
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="propertyType in propertyTypes"
        class="flex flex-row px-4 hover:bg-gray-50 items-center"
      >
        <Link
          :href="route('admin.property_types.edit', { id: propertyType.id })"
          :key="propertyType.id"
          class="flex-1 block py-3"
        >
          {{ propertyType.name }}
        </Link>
        <el-popconfirm
          confirm-button-text="Да"
          cancel-button-text="Нет"
          confirm-button-type="danger"
          hide-icon
          title="Удалить?"
          @confirm="deleteItem(propertyType.id)"
        >
          <template #reference>
            <el-button
              type="danger"
              plain
              :icon="Delete"
              size="small"
            />
          </template>
        </el-popconfirm>
      </div>
    </div>

    <div>
      <Pagination :pagination="pagination" />
    </div>
  </AdminLayout>
</template>

<style scoped>

</style>
