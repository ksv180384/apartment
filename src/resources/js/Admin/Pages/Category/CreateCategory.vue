<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import CategoryForm from '@/Admin/Pages/Category/Components/CategoryForm.vue';

defineProps({
  lastOrder: { type: Number, default: 1 },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.categories.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить категорию" />

  <AdminLayout header-title="Добавить категорию">

    <CategoryForm
      :last-order="lastOrder"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
