<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import CategoryForm from '@/Admin/Pages/Category/Components/CategoryForm.vue';

const props = defineProps({
  category: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.categories.update', { id: props.category.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить категорию" />

  <AdminLayout :header-title="`Изменить категорию ${category.name}`">

    <CategoryForm
      :category="category"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
