<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { Delete } from '@element-plus/icons-vue';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';

defineProps({
  ownershipTypes: { type: Array, required: [] },
});

const deleteItem = (id) => {
  router.delete(route('admin.ownership_types.destroy', { id: id }), {
    onSuccess: () => {
      ElMessage.success('Форма собственности успешно удалена.');
    },
    onError: (errors) => {
      ElMessage.error('Ошибка при удалении.');
    }
  });
}
</script>

<template>
  <Head title="Список назначений" />

  <AdminLayout header-title="Список форм собственности">
    <div class="flex justify-between py-3">
      <div>
        <Link :href="route('admin.parameters.index')">
          <el-link type="primary">Назад</el-link>
        </Link>
      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.ownership_types.create')">
            Добавить форму собственности
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="ownershipType in ownershipTypes"
        class="flex flex-row px-4 hover:bg-gray-50 items-center"
      >
        <Link
          :href="route('admin.ownership_types.edit', { id: ownershipType.id })"
          :key="ownershipType.id"
          class="flex-1 block py-3"
        >
          {{ ownershipType.name }}
        </Link>
        <el-popconfirm
          confirm-button-text="Да"
          cancel-button-text="Нет"
          confirm-button-type="danger"
          hide-icon
          title="Удалить?"
          @confirm="deleteItem(ownershipType.id)"
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
  </AdminLayout>
</template>

<style scoped>

</style>

