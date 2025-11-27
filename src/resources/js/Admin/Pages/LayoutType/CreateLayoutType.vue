<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import LayoutTypeForm from '@/Admin/Pages/LayoutType/Components/LayoutTypeForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.layout_types.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить планировку" />

  <AdminLayout header-title="Добавить планировку">
    <LayoutTypeForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
