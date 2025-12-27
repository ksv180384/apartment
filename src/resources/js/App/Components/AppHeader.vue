<script setup>

import { Link } from '@inertiajs/vue3';
</script>

<template>
  <header class="bg-white shadow-sm border-b border-b-violet-300 fixed w-full z-10">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-8">
        <a href="#" class="text-violet-600 text-2xl font-bold uppercase">Триумф</a>
      </div>
      <nav class="hidden md:flex space-x-6 text-gray-700">
        <Link :href="route('rents.index')" class="hover:text-violet-600">
         Аренда
        </Link>
        <Link :href="route('sales.index')" class="hover:text-violet-600">
          Покупка
        </Link>
        <a href="#" class="hover:text-violet-600">Неделя</a>
        <a href="#" class="hover:text-violet-600">2 гостя</a>
      </nav>
      <div class="flex items-center space-x-4">
        <slot name="right"></slot>
      </div>
    </div>
  </header>
</template>

<style scoped>

</style>
