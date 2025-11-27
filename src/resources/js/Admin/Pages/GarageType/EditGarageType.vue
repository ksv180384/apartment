<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import GarageTypeForm from '@/Admin/Pages/GarageType/Components/GarageTypeForm.vue';

const props = defineProps({
  garageType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.garage_types.update', { id: props.garageType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить тип гаража" />

  <AdminLayout :header-title="`Изменить тип гаража ${garageType.name}`">

    <GarageTypeForm
      :garage-type="garageType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
