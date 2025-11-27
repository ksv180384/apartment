<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import ConditionForm from '@/Admin/Pages/Condition/Components/ConditionForm.vue';

defineProps({
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.conditions.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить состояние" />

  <AdminLayout header-title="Добавить состояние">
    <ConditionForm
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
