<script setup>

</script>

<template>
  <header class="bg-white shadow-sm border-b border-b-violet-300 fixed w-full z-10">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-8">
        <a href="#" class="text-violet-600 text-2xl font-bold uppercase">Триумф</a>
        <nav class="hidden md:flex space-x-6 text-gray-700">
          <a href="#" class="hover:text-violet-600">Жилье в этой части карты</a>
          <a href="#" class="hover:text-violet-600">Неделя</a>
          <a href="#" class="hover:text-violet-600">2 гостя</a>
        </nav>
      </div>
      <div class="flex items-center space-x-4">
        <button class="bg-red-600 text-white px-4 py-2 rounded-full flex items-center space-x-2">
          <i class="fas fa-search"></i>
        </button>
        <button class="border border-gray-300 px-4 py-2 rounded-full flex items-center space-x-2">
          <i class="fas fa-sliders-h"></i>
          <span>Фильтры</span>
        </button>
        <button class="p-2 border border-gray-300 rounded-full">
          <i class="fas fa-globe"></i>
        </button>
        <button class="p-2 border border-gray-300 rounded-full">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </header>
</template>

<style scoped>

</style>
