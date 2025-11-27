<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import FinishingTypeForm from '@/Admin/Pages/FinishingType/Components/FinishingTypeForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.finishing_types.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить тип отделки" />

  <AdminLayout header-title="Добавить тип отделки">
    <FinishingTypeForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
