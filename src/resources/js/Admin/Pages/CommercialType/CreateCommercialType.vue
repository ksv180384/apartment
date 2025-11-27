<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import CommercialTypeForm from '@/Admin/Pages/CommercialType/Components/CommercialTypeForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.commercial_types.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить типы коммерческой недвижимости" />

  <AdminLayout header-title="Добавить тип коммерческой недвижимости">
    <CommercialTypeForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
