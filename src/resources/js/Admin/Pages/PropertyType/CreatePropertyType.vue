<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import PropertyTypeForm from '@/Admin/Pages/PropertyType/Components/PropertyTypeForm.vue';

defineProps({
  lastOrder: { type: Number, default: 1 },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.property_types.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить вид недвижимости" />

  <AdminLayout header-title="Добавить вид недвижимости">

    <PropertyTypeForm
      :last-order="lastOrder"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
