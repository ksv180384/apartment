<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import OwnershipTypeForm from '@/Admin/Pages/OwnershipType/Components/OwnershipTypeForm.vue';

const props = defineProps({
  ownershipType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.ownership_types.update', { id: props.ownershipType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить форму собственности" />

  <AdminLayout :header-title="`Изменить форму собственности ${ownershipType.name}`">

    <OwnershipTypeForm
      :ownership-type="ownershipType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
