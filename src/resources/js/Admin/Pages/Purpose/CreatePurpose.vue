<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import PurposeForm from '@/Admin/Pages/Purpose/Components/PurposeForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.purposes.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить назначение" />

  <AdminLayout header-title="Добавить назначение">
    <PurposeForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
