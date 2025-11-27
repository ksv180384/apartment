<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import OwnershipTypeForm from '@/Admin/Pages/OwnershipType/Components/OwnershipTypeForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.ownership_types.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить форму собственности" />

  <AdminLayout header-title="Добавить форму собственности">
    <OwnershipTypeForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
