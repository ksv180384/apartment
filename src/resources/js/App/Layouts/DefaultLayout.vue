<script setup>

import AppHeader from '@/App/Components/AppHeader.vue';
import AppFooter from '@/App/Components/AppFooter.vue';
</script>

<template>
<div>
  <AppHeader>
    <template #right>
      <slot name="headerRight"></slot>
    </template>
  </AppHeader>
  <!-- Main Content -->
  <main class="container mx-auto lg:px-4 py-6 flex gap-6 pt-19 lg:pt-24 flex-col lg:flex-row">

    <slot></slot>

  </main>

  <!-- Footer -->
  <AppFooter/>
</div>
</template>

<style scoped>

</style>
