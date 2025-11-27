<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import RepairTypeForm from '@/Admin/Pages/RepairType/Components/RepairTypeForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.repair_types.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить тип ремонта" />

  <AdminLayout header-title="Добавить тип ремонта">
    <RepairTypeForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
