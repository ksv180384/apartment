<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import RepairTypeForm from '@/Admin/Pages/RepairType/Components/RepairTypeForm.vue';

const props = defineProps({
  repairType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.repair_types.update', { id: props.repairType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить состояние" />

  <AdminLayout :header-title="`Изменить состояние ${repairType.name}`">

    <RepairTypeForm
      :repair-type="repairType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
