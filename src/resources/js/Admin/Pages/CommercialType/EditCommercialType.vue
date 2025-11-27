<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import CommercialTypeForm from '@/Admin/Pages/CommercialType/Components/CommercialTypeForm.vue';

const props = defineProps({
  commercialType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.commercial_types.update', { id: props.repairType.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить тип коммерческой недвижимости" />

  <AdminLayout :header-title="`Изменить тип коммерческой недвижимости ${commercialType.name}`">

    <CommercialTypeForm
      :commercial-type="commercialType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
