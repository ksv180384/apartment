<script setup>
import { Head } from '@inertiajs/vue3';

import AdminLayout from '@/Admin/Layouts/AdminLayout.vue';
import ConditionForm from '@/Admin/Pages/Condition/Components/ConditionForm.vue';

const props = defineProps({
  condition: { type: Object, default: {} },
  errors: { type: Object, default: {} },
});

const submit = (form) => {
  form.put(route('admin.conditions.update', { id: props.condition.id }), {
    onFinish: (res) => {

    }
  });
}
</script>

<template>
  <Head title="Изменить состояние" />

  <AdminLayout :header-title="`Изменить состояние ${condition.name}`">

    <ConditionForm
      :condition="condition"
      :errors="errors"
      @submit="submit"
    />

  </AdminLayout>
</template>

<style scoped>

</style>
