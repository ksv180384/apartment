<script setup>

import DefaultLayout from '@/App/Layouts/DefaultLayout.vue';

const { property } = defineProps({
  property: { type: Object, required: true },
});
</script>

<template>
  <default-layout>

  </default-layout>
</template>

<style scoped>

</style>
