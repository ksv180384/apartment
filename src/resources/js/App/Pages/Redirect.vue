<script setup>
import { onMounted } from 'vue';

const { redirect } = defineProps({
  redirect: {
    type: String,
  },
});

onMounted(() => {
  window.location.href = redirect;
});
</script>

<template>
<a :href="redirect">Перейти на другую страницу</a>
</template>

<style scoped>

</style>
