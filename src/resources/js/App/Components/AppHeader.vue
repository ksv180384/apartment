<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const isMenuOpen = ref(false);
const isPhoneVisible = ref(false);

// Получаем текущий путь без домена
const currentPath = computed(() => {
  const url = new URL(page.url, window.location.origin);
  return url.pathname;
});

// Функция для проверки активного маршрута
const isActive = (routeName) => {
  const routeUrl = route(routeName);
  const routePath = new URL(routeUrl, window.location.origin).pathname;
  return currentPath.value === routePath;
};

// Полный и частично скрытый номер
const fullPhone = '+7 (953) 313-23-42';
const maskedPhone = '+7 (953) ***-**-42';

// Переключение видимости номера
const togglePhoneVisibility = () => {
  isPhoneVisible.value = true;
};
</script>

<template>
  <header class="bg-white shadow-sm border-b border-b-violet-300 fixed w-full h-[70px] z-10">
    <div class="container mx-auto px-4 h-full flex items-center justify-between">
      <div class="flex items-center space-x-8">
        <a href="#" class="text-violet-600 text-lg lg:text-2xl font-bold uppercase">Триумф</a>
      </div>
      <nav class="flex-1 ps-20 hidden md:flex space-x-6 text-gray-700 h-full items-center">
        <Link
          :href="route('home')"
          class="hover:text-violet-600 relative pb-1 h-full flex items-center"
          :class="{ 'text-violet-600': isActive('home') }"
        >
          Главная
          <span
            v-if="isActive('home')"
            class="absolute bottom-0 left-0 w-full h-0.5 bg-violet-600 rounded-full"
          ></span>
        </Link>
        <Link
          :href="route('rents.index')"
          class="hover:text-violet-600 relative pb-1 h-full flex items-center"
          :class="{ 'text-violet-600': isActive('rents.index') }"
        >
         Аренда
          <span
            v-if="isActive('rents.index')"
            class="absolute bottom-0 left-0 w-full h-0.5 bg-violet-600 rounded-full"
          ></span>
        </Link>
        <Link
          :href="route('sales.index')"
          class="hover:text-violet-600 relative pb-1 h-full flex items-center"
          :class="{ 'text-violet-600': isActive('sales.index') }"
        >
          Покупка
          <span
            v-if="isActive('sales.index')"
            class="absolute bottom-0 left-0 w-full h-0.5 bg-violet-600 rounded-full"
          ></span>
        </Link>
        <Link
          :href="route('contacts.index')"
          class="hover:text-violet-600 relative pb-1 h-full flex items-center"
          :class="{ 'text-violet-600': isActive('contacts.index') }"
        >
          Контакты
          <span
            v-if="isActive('contacts.index')"
            class="absolute bottom-0 left-0 w-full h-0.5 bg-violet-600 rounded-full"
          ></span>
        </Link>
      </nav>

      <div class="flex-1 flex items-center lg:justify-end justify-center">
        <span
          v-if="!isPhoneVisible"
          @click="togglePhoneVisibility"
          class="text-gray-800 text-sm lg:text-lg font-medium transition-colors whitespace-nowrap flex items-center gap-2 cursor-pointer"
        >
          <svg class="w-5 h-5" fill="none" viewBox="0 0 20 20">
            <path fill="#292D32" d="M14.542 18.958c-.942 0-1.934-.225-2.959-.658-1-.425-2.008-1.008-2.992-1.717a26 26 0 0 1-2.808-2.391 25 25 0 0 1-2.391-2.8c-.717-1-1.292-2-1.7-2.967-.434-1.033-.65-2.033-.65-2.975 0-.65.116-1.267.341-1.842A4.45 4.45 0 0 1 2.5 1.992c.642-.634 1.375-.95 2.158-.95.325 0 .658.075.942.208.325.15.6.375.8.675L8.333 4.65c.175.242.309.475.4.708.108.25.167.5.167.742 0 .317-.092.625-.267.917a3.3 3.3 0 0 1-.558.708l-.567.592c.008.025.017.041.025.058.1.175.3.475.683.925.409.467.792.892 1.176 1.283.491.484.9.867 1.283 1.184.475.4.783.6.966.691l-.016.042.608-.6a3.1 3.1 0 0 1 .75-.575c.458-.283 1.042-.333 1.625-.092.217.092.45.217.7.392l2.767 1.967c.308.208.533.475.666.791.125.317.184.609.184.9 0 .4-.092.8-.267 1.175s-.392.7-.667 1c-.474.525-.991.9-1.591 1.142a4.9 4.9 0 0 1-1.858.358M4.657 2.292c-.458 0-.883.2-1.292.6-.383.358-.65.75-.816 1.175a3.65 3.65 0 0 0-.258 1.383c0 .775.183 1.617.55 2.483.374.884.9 1.8 1.566 2.717a23 23 0 0 0 2.258 2.65 23.5 23.5 0 0 0 2.659 2.267c.9.658 1.825 1.191 2.742 1.575 1.425.608 2.758.75 3.858.291.425-.175.8-.441 1.142-.825a2.7 2.7 0 0 0 .466-.7c.1-.208.15-.425.15-.641a1 1 0 0 0-.091-.417.63.63 0 0 0-.234-.25l-2.767-1.967a2.4 2.4 0 0 0-.458-.258c-.183-.075-.258-.15-.541.025a1.9 1.9 0 0 0-.484.375l-.633.625a1.19 1.19 0 0 1-1.208.25l-.226-.1c-.341-.183-.741-.467-1.183-.842-.4-.341-.833-.741-1.358-1.258a29 29 0 0 1-1.242-1.35q-.587-.687-.85-1.175l-.1-.25c-.05-.192-.066-.3-.066-.417 0-.3.108-.566.316-.775l.625-.65c.167-.166.292-.325.375-.466a.53.53 0 0 0 .092-.284.8.8 0 0 0-.067-.266 2.4 2.4 0 0 0-.267-.442L5.384 2.642a.77.77 0 0 0-.308-.259 1 1 0 0 0-.417-.091m6.967 10.216-.133.567.224-.583c-.041-.009-.074 0-.091.016M15.417 8.125a.63.63 0 0 1-.625-.625c0-.3-.3-.925-.8-1.458-.492-.525-1.034-.834-1.492-.834a.63.63 0 0 1-.625-.625.63.63 0 0 1 .625-.625c.808 0 1.658.434 2.4 1.225.692.742 1.142 1.65 1.142 2.317a.63.63 0 0 1-.625.625M18.333 8.125a.63.63 0 0 1-.625-.625A5.21 5.21 0 0 0 12.5 2.292a.63.63 0 0 1-.625-.625.63.63 0 0 1 .625-.625c3.558 0 6.458 2.9 6.458 6.458a.63.63 0 0 1-.625.625"></path>
          </svg>
          {{ isPhoneVisible ? fullPhone : maskedPhone }}
        </span>
        <a
          v-else
          href="tel:+79533132342"
          @click="togglePhoneVisibility"
          class="text-gray-800 text-sm lg:text-lg font-medium transition-colors whitespace-nowrap flex items-center gap-2 cursor-pointer"
        >
          <svg class="w-5 h-5" fill="none" viewBox="0 0 20 20">
            <path fill="#292D32" d="M14.542 18.958c-.942 0-1.934-.225-2.959-.658-1-.425-2.008-1.008-2.992-1.717a26 26 0 0 1-2.808-2.391 25 25 0 0 1-2.391-2.8c-.717-1-1.292-2-1.7-2.967-.434-1.033-.65-2.033-.65-2.975 0-.65.116-1.267.341-1.842A4.45 4.45 0 0 1 2.5 1.992c.642-.634 1.375-.95 2.158-.95.325 0 .658.075.942.208.325.15.6.375.8.675L8.333 4.65c.175.242.309.475.4.708.108.25.167.5.167.742 0 .317-.092.625-.267.917a3.3 3.3 0 0 1-.558.708l-.567.592c.008.025.017.041.025.058.1.175.3.475.683.925.409.467.792.892 1.176 1.283.491.484.9.867 1.283 1.184.475.4.783.6.966.691l-.016.042.608-.6a3.1 3.1 0 0 1 .75-.575c.458-.283 1.042-.333 1.625-.092.217.092.45.217.7.392l2.767 1.967c.308.208.533.475.666.791.125.317.184.609.184.9 0 .4-.092.8-.267 1.175s-.392.7-.667 1c-.474.525-.991.9-1.591 1.142a4.9 4.9 0 0 1-1.858.358M4.657 2.292c-.458 0-.883.2-1.292.6-.383.358-.65.75-.816 1.175a3.65 3.65 0 0 0-.258 1.383c0 .775.183 1.617.55 2.483.374.884.9 1.8 1.566 2.717a23 23 0 0 0 2.258 2.65 23.5 23.5 0 0 0 2.659 2.267c.9.658 1.825 1.191 2.742 1.575 1.425.608 2.758.75 3.858.291.425-.175.8-.441 1.142-.825a2.7 2.7 0 0 0 .466-.7c.1-.208.15-.425.15-.641a1 1 0 0 0-.091-.417.63.63 0 0 0-.234-.25l-2.767-1.967a2.4 2.4 0 0 0-.458-.258c-.183-.075-.258-.15-.541.025a1.9 1.9 0 0 0-.484.375l-.633.625a1.19 1.19 0 0 1-1.208.25l-.226-.1c-.341-.183-.741-.467-1.183-.842-.4-.341-.833-.741-1.358-1.258a29 29 0 0 1-1.242-1.35q-.587-.687-.85-1.175l-.1-.25c-.05-.192-.066-.3-.066-.417 0-.3.108-.566.316-.775l.625-.65c.167-.166.292-.325.375-.466a.53.53 0 0 0 .092-.284.8.8 0 0 0-.067-.266 2.4 2.4 0 0 0-.267-.442L5.384 2.642a.77.77 0 0 0-.308-.259 1 1 0 0 0-.417-.091m6.967 10.216-.133.567.224-.583c-.041-.009-.074 0-.091.016M15.417 8.125a.63.63 0 0 1-.625-.625c0-.3-.3-.925-.8-1.458-.492-.525-1.034-.834-1.492-.834a.63.63 0 0 1-.625-.625.63.63 0 0 1 .625-.625c.808 0 1.658.434 2.4 1.225.692.742 1.142 1.65 1.142 2.317a.63.63 0 0 1-.625.625M18.333 8.125a.63.63 0 0 1-.625-.625A5.21 5.21 0 0 0 12.5 2.292a.63.63 0 0 1-.625-.625.63.63 0 0 1 .625-.625c3.558 0 6.458 2.9 6.458 6.458a.63.63 0 0 1-.625.625"></path>
          </svg>
          {{ isPhoneVisible ? fullPhone : maskedPhone }}
        </a>
      </div>

      <div class="flex items-center justify-end w-fit">
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
              :class="{ 'text-violet-600': isActive('home') }"
            >
              Главая
            </Link>
            <Link
              :href="route('rents.index')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
              :class="{ 'text-violet-600': isActive('rents.index') }"
            >
              Аренда
            </Link>
            <Link
              :href="route('sales.index')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
              :class="{ 'text-violet-600': isActive('sales.index') }"
            >
              Покупка
            </Link>
            <Link
              :href="route('contacts.index')"
              @click="isMenuOpen = false"
              class="py-3 px-4 rounded-lg hover:bg-violet-50 hover:text-violet-600 transition-colors text-gray-700"
              :class="{ 'text-violet-600': isActive('contacts.index') }"
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
