<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { Delete } from '@element-plus/icons-vue';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';

defineProps({
  finishingTypes: { type: Array, required: [] },
});

const deleteItem = (id) => {
  router.delete(route('admin.finishing_types.destroy', { id: id }), {
    onSuccess: () => {
      ElMessage.success('Назначение успешно удалено.');
    },
    onError: (errors) => {
      ElMessage.error('Ошибка при удалении.');
    }
  });
}
</script>

<template>
  <Head title="Список тип отделки" />

  <AdminLayout header-title="Список тип отделки">
    <div class="flex justify-between py-3">
      <div>
        <Link :href="route('admin.parameters.index')">
          <el-link type="primary">Назад</el-link>
        </Link>
      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.finishing_types.create')">
            Добавить тип отделки
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="finishingType in finishingTypes"
        class="flex flex-row px-4 hover:bg-gray-50 items-center"
      >
        <Link
          :href="route('admin.finishing_types.edit', { id: finishingType.id })"
          :key="finishingType.id"
          class="flex-1 block py-3"
        >
          {{ finishingType.name }}
        </Link>
        <el-popconfirm
          confirm-button-text="Да"
          cancel-button-text="Нет"
          confirm-button-type="danger"
          hide-icon
          title="Удалить?"
          @confirm="deleteItem(finishingType.id)"
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

