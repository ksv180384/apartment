<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import BuildingClassForm from '@/Admin/Pages/BuildingClass/Components/BuildingClassForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.building_classes.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить класс жилья" />

  <AdminLayout header-title="Добавить класс жилья">
    <BuildingClassForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
