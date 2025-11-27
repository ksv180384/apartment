<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { Delete } from '@element-plus/icons-vue';
import { ElMessage } from 'element-plus';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';

defineProps({
  repairTypes: { type: Array, required: [] },
});

const deleteItem = (id) => {
  router.delete(route('admin.commercial_types.destroy', { id: id }), {
    onSuccess: () => {
      ElMessage.success('Тип коммерческой недвижимости успешно удален.');
    },
    onError: (errors) => {
      ElMessage.error('Ошибка при удалении.');
    }
  });
}
</script>

<template>
  <Head title="Список типов коммерческой недвижимости" />

  <AdminLayout header-title="Список типов коммерческой недвижимости">
    <div class="flex justify-between py-3">
      <div>
        <Link :href="route('admin.parameters.index')">
          <el-link type="primary">Назад</el-link>
        </Link>
      </div>
      <div>
        <el-link type="success" class="![position:initial]">
          <Link :href="route('admin.commercial_types.create')">
            Добавить тип коммерческой недвижимости
          </Link>
        </el-link>
      </div>
    </div>

    <div class="flex-1">
      <div
        v-for="repairType in repairTypes"
        class="flex flex-row px-4 hover:bg-gray-50 items-center"
      >
        <Link
          :href="route('admin.repair_types.edit', { id: repairType.id })"
          :key="repairType.id"
          class="flex-1 block py-3"
        >
          {{ repairType.name }}
        </Link>
        <el-popconfirm
          confirm-button-text="Да"
          cancel-button-text="Нет"
          confirm-button-type="danger"
          hide-icon
          title="Удалить?"
          @confirm="deleteItem(repairType.id)"
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

