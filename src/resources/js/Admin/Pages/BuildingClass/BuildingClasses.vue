<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { Delete } from '@element-plus/icons-vue';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';

defineProps({
  buildingClasses: { type: Array, required: [] },
});

const deleteItem = (id) => {
  router.delete(route('admin.building_classes.destroy', { id: id }), {
    onSuccess: () => {
      ElMessage.success('Класс жилья успешно удален.');
    },
    onError: (errors) => {
      ElMessage.error('Ошибка при удалении.');
    }
  });
}
</script>

<template>
  <Head title="Список классов жилья" />

  <AdminLayout header-title="Список классов жилья">
    <div class="flex justify-between py-3">
      <div>
        <Link :href="route('admin.parameters.index')">
          <el-link type="primary">Назад</el-link>
        </Link>
      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.building_classes.create')">
            Добавить класс жилья
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="buildingClass in buildingClasses"
        class="flex flex-row px-4 hover:bg-gray-50 items-center"
      >
        <Link
          :href="route('admin.building_classes.edit', { id: buildingClass.id })"
          :key="buildingClass.id"
          class="flex-1 block py-3"
        >
          {{ buildingClass.name }}
        </Link>
        <el-popconfirm
          confirm-button-text="Да"
          cancel-button-text="Нет"
          confirm-button-type="danger"
          hide-icon
          title="Удалить?"
          @confirm="deleteItem(buildingClass.id)"
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

