<script setup>
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { onClickOutside } from '@vueuse/core';

const { propertyTypes } = defineProps({
  propertyTypes: { type: Array, default: [] },
});

const filterButtonRef = ref(null);
const filterDropdownRef = ref(null);
const showFilterDropdown = ref(false);

const filters = reactive({
  property_types: [],
  minPrice: null,
  maxPrice: null,
  rooms: []
});

// Обработка кликов вне блока
onClickOutside(filterDropdownRef, (event) => {
  // Проверяем, что клик был не по кнопке
  if (!filterButtonRef.value?.contains(event.target)) {
    showFilterDropdown.value = false
  }
}, {
  // Опционально: можно добавить игнорирование элементов
  ignore: [filterButtonRef]
});

// Переключение фильтра комнат
const togglePropertyTypesFilter = (propertyType) => {
  const index = filters.property_types.indexOf(propertyType.id);

  if (index > -1) {
    filters.property_types = filters.property_types.filter(item => {
      return propertyType.id !== item;
    });
  } else {
    filters.property_types.push(propertyType.id)
  }

  applyFilters();
}

// Сброс фильтров
const resetFilters = () => {
  filters.property_types = [];
  filters.minPrice = null;
  filters.maxPrice = null;
  filters.rooms = [];
  showFilterDropdown.value = false;
  // Здесь можно добавить логику сброса отображения
}

// Применение фильтров
const applyFilters = () => {
  // Подготавливаем параметры для запроса
  const params = {};

  // Добавляем property_types если они есть
  if (filters.property_types.length > 0) {
    params.property_type = filters.property_types.join(',');
  }

  // Добавляем другие фильтры если они есть
  if (filters.minPrice) params.min_price = filters.minPrice;
  if (filters.maxPrice) params.max_price = filters.maxPrice;
  if (filters.rooms.length > 0) params.rooms = filters.rooms.join(',');

  // Используем Inertia router для обновления страницы с параметрами
  router.get(window.location.pathname, params, {
    preserveState: true,
    replace: true,
    preserveScroll: true
  });

  // showFilterDropdown.value = false;
}

// Переключение выпадающего меню
const toggleFilterDropdown = () => {
  showFilterDropdown.value = !showFilterDropdown.value
}
</script>

<template>
  <div class="relative" ref="filterButtonRef">
    <button
      @click="toggleFilterDropdown"
      class="flex justify-center items-center cursor-pointer space-x-2 w-[36px] h-[36px] ms-0 lg:ms-6"
    >
      <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19 3H5C3.58579 3 2.87868 3 2.43934 3.4122C2 3.8244 2 4.48782 2 5.81466V6.50448C2 7.54232 2 8.06124 2.2596 8.49142C2.5192 8.9216 2.99347 9.18858 3.94202 9.72255L6.85504 11.3624C7.49146 11.7206 7.80967 11.8998 8.03751 12.0976C8.51199 12.5095 8.80408 12.9935 8.93644 13.5872C9 13.8722 9 14.2058 9 14.8729L9 17.5424C9 18.452 9 18.9067 9.25192 19.2613C9.50385 19.6158 9.95128 19.7907 10.8462 20.1406C12.7248 20.875 13.6641 21.2422 14.3321 20.8244C15 20.4066 15 19.4519 15 17.5424V14.8729C15 14.2058 15 13.8722 15.0636 13.5872C15.1959 12.9935 15.488 12.5095 15.9625 12.0976C16.1903 11.8998 16.5085 11.7206 17.145 11.3624L20.058 9.72255C21.0065 9.18858 21.4808 8.9216 21.7404 8.49142C22 8.06124 22 7.54232 22 6.50448V5.81466C22 4.48782 22 3.8244 21.5607 3.4122C21.1213 3 20.4142 3 19 3Z" fill="#1C274C"/>
      </svg>
    </button>

    <!-- Выпадающий блок фильтров -->
    <transition
      enter-active-class="transition duration-200 ease-out"
      enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100"
      leave-active-class="transition duration-150 ease-in"
      leave-from-class="transform scale-100 opacity-100"
      leave-to-class="transform scale-95 opacity-0"
    >
      <div
        v-if="showFilterDropdown"
        ref="filterDropdownRef"
        class="absolute right-0 mt-2 w-[calc(100vw-200px)] bg-white rounded-lg shadow-lg border border-gray-200 z-50 p-4"
      >
        <div class="space-y-4">


          <div class="flex flex-row gap-2 flex-wrap justify-center">
            <button
              v-for="propertyType in propertyTypes"
              :key="propertyType.id"
              @click="togglePropertyTypesFilter(propertyType)"
              class="px-3 py-1 text-sm rounded-full border cursor-pointer"
              :class="filters.property_types.includes(propertyType.id)
                      ? 'bg-blue-100 border-blue-500 text-blue-700'
                      : 'border-gray-300 text-gray-700 hover:border-gray-400'"
            >
              {{ propertyType.name }}
            </button>
          </div>

<!--          <div>-->
<!--            <h3 class="text-sm font-medium text-gray-700 mb-2">Количество комнат</h3>-->
<!--            <div class="flex flex-wrap gap-2">-->
<!--              <button-->
<!--                v-for="room in [1,2,3,4,'5+']"-->
<!--                :key="room"-->
<!--                @click="toggleRoomFilter(room)"-->
<!--                class="px-3 py-1 text-sm rounded-full border"-->
<!--                :class="filters.rooms.includes(room)-->
<!--                      ? 'bg-blue-100 border-blue-500 text-blue-700'-->
<!--                      : 'border-gray-300 text-gray-700 hover:border-gray-400'"-->
<!--              >-->
<!--                {{ room }}-->
<!--              </button>-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="pt-4 border-t border-gray-200">-->
<!--            <div class="flex justify-between space-x-2">-->
<!--              <button-->
<!--                @click="resetFilters"-->
<!--                class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50"-->
<!--              >-->
<!--                Сбросить-->
<!--              </button>-->
<!--              <button-->
<!--                @click="applyFilters"-->
<!--                class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700"-->
<!--              >-->
<!--                Применить-->
<!--              </button>-->
<!--            </div>-->
<!--          </div>-->
        </div>
      </div>
    </transition>
  </div>
</template>

<style scoped>

</style>
