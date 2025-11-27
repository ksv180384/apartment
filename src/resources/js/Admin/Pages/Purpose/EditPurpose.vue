<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import PurposeForm from '@/Admin/Pages/Purpose/Components/PurposeForm.vue';

const props = defineProps({
  purpose: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.purposes.update', { id: props.purpose.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить назначение" />

  <AdminLayout :header-title="`Изменить назначение ${purpose.name}`">

    <PurposeForm
      :purpose="purpose"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
