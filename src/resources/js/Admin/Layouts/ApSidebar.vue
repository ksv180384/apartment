<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  isMobile: { type: Boolean },
  isMobileOpen: { type: Boolean },
});
</script>

<template>
  <aside
    :class="[
      'fixed flex flex-col md:mt-0 top-0 px-5 left-0 bg-white dark:bg-gray-900 dark:border-gray-800 text-gray-900 h-screen transition-all duration-300 ease-in-out z-2 border-r border-gray-200',
      {
        'md:w-[290px]': !isMobile || isMobileOpen,
        'translate-x-0 w-[290px]': isMobileOpen,
        '-translate-x-full': !isMobileOpen,
        'md:translate-x-0': true,
      },
    ]"
  >
    <div class="py-5 flex justify-center">
      <a href="/" class="uppercase font-bold">
        Логотип
      </a>
    </div>
    <div
      class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar"
    >
      <nav class="mb-6">
        <ul class="flex flex-col gap-4">
          <li><Link :href="route('admin.categories.index')">Категории</Link></li>
          <li><Link :href="route('admin.property_types.index')">Виды недвижимости</Link></li>
          <li><Link :href="route('admin.properties.index')">Недвижимость</Link></li>
          <li><Link :href="route('admin.parameters.index')">Параметры</Link></li>
        </ul>
      </nav>
    </div>
  </aside>
</template>

