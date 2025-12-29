<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const isMenuOpen = ref(false);
</script>

<template>
  <header class="bg-white shadow-sm border-b border-b-violet-300 fixed w-full h-[70px] z-10">
    <div class="container mx-auto px-4 h-full flex items-center justify-between">
      <div class="flex items-center space-x-8">
        <a href="#" class="text-violet-600 text-2xl font-bold uppercase">Триумф</a>
      </div>
      <nav class="hidden md:flex space-x-6 text-gray-700">
        <Link :href="route('home')" class="hover:text-violet-600">
          Главная
        </Link>
        <Link :href="route('rents.index')" class="hover:text-violet-600">
         Аренда
        </Link>
        <Link :href="route('sales.index')" class="hover:text-violet-600">
          Покупка
        </Link>
        <Link :href="route('contacts.index')" class="hover:text-violet-600">
          Контакты
        </Link>
      </nav>
      <div class="flex items-center justify-end space-x-4 w-[100px]">
        <slot name="right"></slot>
        <!-- Бургер-кнопка для мобильных -->
        <button
          @click="isMenuOpen = true"
          class="md:hidden p-2 rounded-lg hover:bg-violet-50 transition-colors"
        >
          <svg v-if="!isMenuOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg v-else class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Боковое меню для мобильных -->
      <div
        v-if="isMenuOpen"
        class="md:hidden fixed inset-0 z-50"
      >
        <!-- Затемнение фона -->
        <div
          class="absolute inset-0 bg-black opacity-50"
          @click="isMenuOpen = false"
        ></div>

        <!-- Само меню -->
        <div class="absolute right-0 top-0 h-full w-64 bg-white shadow-xl animate-slide-in">
          <!-- Заголовок меню -->
          <div class="p-4 border-b border-gray-200 flex items-center justify-between">
            <span class="text-lg font-semibold text-gray-800">Меню</span>
            <button
              @click="isMenuOpen = false"
              class="p-2 rounded-lg hover:bg-gray-100 transition-colors"
            >
              <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Навигация -->
          <nav class="flex flex-col p-4">
            <Link
              :href="route('home')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
            >
              Главая
            </Link>
            <Link
              :href="route('rents.index')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
            >
              Аренда
            </Link>
            <Link
              :href="route('sales.index')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
            >
              Покупка
            </Link>
            <Link
              :href="route('contacts.index')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
            >
              Контакты
            </Link>
          </nav>
        </div>
      </div>

    </div>
  </header>
</template>

<style scoped>
.animate-slide-in {
  animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
  from {
    transform: translateX(100%);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}
</style>
