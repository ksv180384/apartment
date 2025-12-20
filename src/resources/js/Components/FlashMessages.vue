<script setup>
import { usePage } from '@inertiajs/vue3'
import { watch } from 'vue'

const clearFlash = () => {
  // Очищаем flash сообщения
  usePage().props.flash = {}
}

// Автоматическое скрытие через 5 секунд
watch(() => usePage().props.flash, (flash) => {
  if (flash.success || flash.error) {
    setTimeout(() => {
      clearFlash()
    }, 10000)
  }
}, { deep: true })
</script>

<template>
  <div v-if="$page.props.flash.success || $page.props.flash.error"
       class="fixed top-4 right-4 z-50 w-full max-w-sm">

    <!-- Success Message -->
    <div v-if="$page.props.flash.success"
         class="mb-3 flex items-center justify-between bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-lg animate-slide-in">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">
            {{ $page.props.flash.success }}
          </p>
        </div>
      </div>
      <button @click="clearFlash" class="ml-3 text-green-500 hover:text-green-700">
        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </button>
    </div>

    <!-- Error Message -->
    <div v-if="$page.props.flash.error"
         class="mb-3 flex items-center justify-between bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-lg animate-slide-in">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-red-800">
            {{ $page.props.flash.error }}
          </p>
        </div>
      </div>
      <button @click="clearFlash" class="ml-3 text-red-500 hover:text-red-700">
        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </button>
    </div>

  </div>
</template>

<style scoped>
@keyframes slide-in {
  from {
    transform: translateX(100%);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

.animate-slide-in {
  animation: slide-in 0.3s ease-out;
}
</style>
