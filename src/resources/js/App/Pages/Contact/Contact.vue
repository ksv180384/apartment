<script setup>
import { ref, computed } from 'vue';

import DefaultLayout from '@/App/Layouts/DefaultLayout.vue';
import YaMapPoint from '@/App/Components/YaMapPoint.vue';

const coordinates = ref([36.598892, 55.118967]);
const isPhoneVisible = ref(false);
const phone = computed(() => {
  return isPhoneVisible.value ? '+7 (953) 313-23-42' : '+7 (953) *** ** 42';
});
</script>

<template>
  <default-layout>

    <div class="flex flex-col">
      <h1 class="text-center pt-2 lg:pb-12 pb-6 lg:text-4xl text-2xl font-semibold">
        Адрес агентства недвижимости «Триумф»
      </h1>

      <div class="flex lg:flex-row flex-col w-full gap-4 px-4 lg:px-0">

        <div class="flex-1">
          <img src="/images/webattach.mail.yandex.jpg" class="overflow-hidden object-cover rounded-xl" alt=""/>
        </div>
        <div class="flex-1 flex flex-col">
          <div class="relative mb-4 h-[50px]">
            <div
              class="inline-flex items-center gap-2 cursor-pointer group transition-all duration-300"
              :class="{ 'pb-2': isPhoneVisible }"
            >
              <!-- Иконка телефона -->
              <a v-if="isPhoneVisible" href="tel:+79533132342" class="p-2 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="text-blue-600"
                >
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
              </a>
              <span v-else class="p-2 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors duration-300">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="text-blue-600"
                >
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
              </span>

              <!-- Номер телефона с маскировкой -->
              <div class="relative overflow-hidden" @click="isPhoneVisible = !isPhoneVisible">
                <!-- Полностью видимый номер -->
                <div
                  class="text-xl font-semibold text-gray-800 transition-all duration-500 ease-out"
                  :class="{
                  'opacity-100 translate-y-0': isPhoneVisible,
                  'opacity-0 -translate-y-full': !isPhoneVisible
                }"
                >
                  {{ phone }}
                </div>

                <!-- Частично скрытый номер -->
                <div
                  class="absolute inset-0 text-xl font-semibold text-gray-800 transition-all duration-500 ease-out"
                  :class="{
                  'opacity-0 translate-y-full': isPhoneVisible,
                  'opacity-100 translate-y-0': !isPhoneVisible
                }"
                >
                  {{ phone }}
                </div>
              </div>

              <!-- Стрелка/иконка для индикации -->
              <div
                class="ml-2 p-1 text-gray-400 group-hover:text-blue-500 transition-all duration-300 transform"
                :class="{
                'rotate-180': isPhoneVisible
              }"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <polyline points="6 9 12 15 18 9"/>
                </svg>
              </div>
            </div>

            <!-- Подсказка -->
            <div
              class="absolute left-0 right-0 mt-1 text-xs text-gray-500 transition-all duration-300 overflow-hidden"
              :class="{
              'max-h-6 opacity-100': !isPhoneVisible,
              'max-h-0 opacity-0': isPhoneVisible
            }"
            >
              Нажмите, чтобы показать номер
            </div>
          </div>

          <div class="flex items-center gap-2 text-sm lg:text-md text-gray-600 pt-2 pb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
              <g fill="none" stroke="currentColor" stroke-width="1.5"><path d="m18 8l.949.316c.99.33 1.485.495 1.768.888s.283.915.283 1.958v5.667c0 1.29 0 1.936-.34 2.351c-.115.14-.255.26-.413.35c-.465.267-1.102.16-2.375-.051c-1.256-.21-1.884-.314-2.507-.262q-.329.027-.65.097c-.61.134-1.185.421-2.334.996c-1.5.75-2.25 1.125-3.048 1.24q-.36.052-.726.052c-.807-.002-1.595-.265-3.172-.79l-.384-.128c-.99-.33-1.485-.495-1.768-.888S3 18.88 3 17.838v-4.93c0-1.659 0-2.488.488-2.934a1.5 1.5 0 0 1 .281-.203c.578-.322 1.365-.06 2.938.465"></path><path d="M6 7.7C6 4.552 8.686 2 12 2s6 2.552 6 5.7c0 3.124-1.915 6.769-4.903 8.072a2.76 2.76 0 0 1-2.194 0C7.915 14.47 6 10.824 6 7.7Z"></path><circle cx="12" cy="8" r="2"></circle></g>
            </svg>
            Калужская обл., Обнинск, пр. Маркса, 61, первый этаж
          </div>
          <div class="overflow-hidden rounded-xl flex-1 basis-[400px]">
            <YaMapPoint :coordinates="coordinates" height="100%"/>
          </div>

        </div>

      </div>
    </div>

  </default-layout>
</template>

<style scoped>

</style>
