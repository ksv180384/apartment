<script setup>
import { computed } from 'vue';

const currentYear = new Date().getFullYear();
const baseYear = 2025;

// Вычисляем текст для отображения года
const yearText = computed(() => {
  if (currentYear === baseYear) {
    return baseYear.toString();
  } else {
    return `${baseYear}-${currentYear}`;
  }
});
</script>

<template>
  <footer class="bg-white border-t mt-8 py-6">
    <div class="container mx-auto px-4 text-center text-sm text-gray-600">
      <p>© {{ yearText }} Агенство недвижимости Триумф</p>
    </div>
  </footer>
</template>

<style scoped>

</style>
