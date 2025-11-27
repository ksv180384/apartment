<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import FinishingTypeForm from '@/Admin/Pages/FinishingType/Components/FinishingTypeForm.vue';

const props = defineProps({
  finishingType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.finishing_types.update', { id: props.finishingType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить тип отделки" />

  <AdminLayout :header-title="`Изменить тип отделки ${finishingType.name}`">

    <FinishingTypeForm
      :finishing-type="finishingType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
