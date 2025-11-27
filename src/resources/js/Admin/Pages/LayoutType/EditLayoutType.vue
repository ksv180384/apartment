<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import LayoutTypeForm from '@/Admin/Pages/LayoutType/Components/LayoutTypeForm.vue';

const props = defineProps({
  layoutType: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.layout_types.update', { id: props.condition.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить планировку" />

  <AdminLayout :header-title="`Изменить планировку ${layoutType.name}`">

    <LayoutTypeForm
      :layout-type="layoutType"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
