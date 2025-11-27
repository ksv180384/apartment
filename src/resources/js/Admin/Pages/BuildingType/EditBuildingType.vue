<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import BuildingTypeForm from '@/Admin/Pages/BuildingType/Components/BuildingTypeForm.vue';

const props = defineProps({
  buildingType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.building_types.update', { id: props.buildingType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить тип дома" />

  <AdminLayout :header-title="`Изменить тип дома ${buildingType.name}`">

    <BuildingTypeForm
      :building-type="buildingType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
