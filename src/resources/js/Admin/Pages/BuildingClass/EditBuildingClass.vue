<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import BuildingClassForm from '@/Admin/Pages/BuildingClass/Components/BuildingClassForm.vue';

const props = defineProps({
  buildingClass: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.building_classes.update', { id: props.buildingClass.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить класс жилья" />

  <AdminLayout :header-title="`Изменить класс жилья ${buildingClass.name}`">

    <BuildingClassForm
      :building-class="buildingClass"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
