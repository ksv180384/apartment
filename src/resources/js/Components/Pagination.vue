<script setup>
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

defineProps({
  pagination: { type: Object, required: true },
});

const currentPage = ref(1);

// Функция для обработки изменения страницы
const handlePageChange = (page) => {
  // Получаем текущие query параметры из URL
  const url = new URL(window.location.href);
  const currentParams = Object.fromEntries(url.searchParams.entries());

  // Обновляем только параметр page, сохраняя остальные
  router.get(url,
    { ...currentParams, page: page },
    {
      preserveState: true,
      replace: true,
      preserveScroll: true,
    }
  );
};

// Следим за изменением текущей страницы
watch(currentPage, (newPage) => {
  handlePageChange(newPage);
});
</script>

<template>
  <el-pagination
    v-if="pagination.last_page > 1"
    v-model:current-page="currentPage"
    :page-size="pagination.per_page"
    :pager-count="3"
    layout="prev, pager, next"
    :total="pagination.total"
    :hide-on-single-page="true"
  >
  </el-pagination>
</template>

<style scoped>

</style>
