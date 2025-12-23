<script setup>

import AppHeader from '@/App/Components/AppHeader.vue';
</script>

<template>
<div>
  <AppHeader/>
  <!-- Main Content -->
  <main class="container mx-auto lg:px-4 py-6 flex gap-6 pt-19 lg:pt-24 flex-col lg:flex-row">

    <slot></slot>

  </main>

  <!-- Footer -->
  <footer class="bg-white border-t mt-8 py-6">
    <div class="container mx-auto px-4 text-center text-sm text-gray-600">
      <p>© 2025 Airbnb, Inc. Условия • Конфиденциальность • Карта сайта</p>
    </div>
  </footer>
</div>
</template>

<style scoped>

</style>
