<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import PropertyTypeForm from '@/Admin/Pages/PropertyType/Components/PropertyTypeForm.vue';

const props = defineProps({
  propertyType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.property_types.update', { id: props.propertyType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить вид недвижимости" />

  <AdminLayout :header-title="`Изменить вид недвижимости ${propertyType.name}`">

    <PropertyTypeForm
      :property-type="propertyType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
