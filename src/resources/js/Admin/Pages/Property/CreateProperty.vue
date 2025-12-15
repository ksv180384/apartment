<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import FlashMessages from '@/Components/FlashMessages.vue';
import PropertyForm from '@/Admin/Pages/Property/Components/Form/PropertyForm.vue';

defineProps({
  categories: { type: Array, default: [] },
  propertyTypes: { type: Array, default: [] },
  conditions: { type: Array, default: [] },
  repairTypes: { type: Array, default: [] },
  buildingClasses: { type: Array, default: [] },
  buildingTypes: { type: Array, default: [] },
  finishingTypes: { type: Array, default: [] },
  commercialTypes: { type: Array, default: [] },
  purposes: { type: Array, default: [] },
  layoutTypes: { type: Array, default: [] },
  garageTypes: { type: Array, default: [] },
  ownershipTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.post(route('admin.properties.store'), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Добавить недвижимость" />

  <AdminLayout header-title="Добавить недвижимость">

    <FlashMessages />

    <PropertyForm
      :categories="categories"
      :property-types="propertyTypes"
      :conditions="conditions"
      :repair-types="repairTypes"
      :building-classes="buildingClasses"
      :building-types="buildingTypes"
      :finishing-types="finishingTypes"
      :commercial-types="commercialTypes"
      :purposes="purposes"
      :layout-types="layoutTypes"
      :garage-types="garageTypes"
      :ownership-types="ownershipTypes"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
