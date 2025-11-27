<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { Delete } from '@element-plus/icons-vue';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';

defineProps({
  buildingTypes: { type: Array, required: [] },
});

const deleteItem = (id) => {
  router.delete(route('admin.building_types.destroy', { id: id }), {
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
  <Head title="Список типов домов" />

  <AdminLayout header-title="Список типов домов">
    <div class="flex justify-between py-3">
      <div>
        <Link :href="route('admin.parameters.index')">
          <el-link type="primary">Назад</el-link>
        </Link>
      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.building_types.create')">
            Добавить тип дома
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="buildingType in buildingTypes"
        class="flex flex-row px-4 hover:bg-gray-50 items-center"
      >
        <Link
          :href="route('admin.building_types.edit', { id: buildingType.id })"
          :key="buildingType.id"
          class="flex-1 block py-3"
        >
          {{ buildingType.name }}
        </Link>
        <el-popconfirm
          confirm-button-text="Да"
          cancel-button-text="Нет"
          confirm-button-type="danger"
          hide-icon
          title="Удалить?"
          @confirm="deleteItem(buildingType.id)"
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

