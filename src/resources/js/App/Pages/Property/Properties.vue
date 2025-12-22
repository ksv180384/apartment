<script setup>
const { properties, pagination } = defineProps({
  properties: { type: Object, required: true },
  pagination: { type: Object, required: true },
});

console.log(properties)
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

  <!-- Main Content -->
  <main class="container mx-auto lg:px-4 py-6 flex gap-6 pt-19 lg:pt-24 flex-col lg:flex-row">

    <!-- Left Panel: Listings -->
    <div class="lg:w-1/2 bg-white lg:mt-0 mt-[50vh] rounded-2xl overflow-hidden">
      <!-- Listing Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 lg:px-0 px-6 gap-6 lg:pt-0 pt-8">

        <template v-for="property in properties" :key="property.id">
          <div class="rounded-2xl overflow-hidden bg-violet-50">
            <div class="relative">
              <img :src="property.image_main" :alt="property.title" class="w-full h-48 object-cover">
              <div class="absolute top-2 left-2 text-violet-700 bg-violet-100 px-2 py-1 rounded-full text-xs font-medium">
                {{ property.category }}
              </div>
            </div>
            <div class="p-4">
              <h3 class="font-semibold mb-1">{{ property.title }}</h3>
              <div class="flex items-center text-sm text-gray-600 mb-2">
                <span>{{ property.property_type }}</span>
              </div>
              <p class="text-sm text-gray-700 mb-2 line-clamp-2">{{ property.address }}</p>
              <p class="text-sm text-gray-500 mb-2"></p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500 font-bold">{{ property.area_total_formatted }}</span>
                <span class="text-lg font-semibold text-violet-700">{{ property.price }}₽</span>
              </div>
            </div>
          </div>
        </template>
        <!-- Card 1 -->
        <div class="rounded-2xl overflow-hidden bg-violet-50">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 text-violet-700 bg-violet-100 px-2 py-1 rounded-full text-xs font-medium">Выбор гостей</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,96 (202)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Колокола Ирландии ✓ Самостоятельно...</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 2 односпальные кровати</p>
            <p class="text-sm text-gray-500 mb-2">12–17 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">19 440₽</span>
              <span class="text-lg font-semibold text-violet-700">15 552₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Суперхозяин</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,88 (17)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Апартаменты KeyGo #0130 ключ к центру...</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 1 кровать 152x203 см</p>
            <p class="text-sm text-gray-500 mb-2">11–16 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">20 298₽</span>
              <span class="text-lg font-semibold text-red-600">16 234₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Выбор гостей</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,93 (14)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Студия KeyGo #0137 Апарт Отель</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 1 кровать 152x203 см</p>
            <p class="text-sm text-gray-500 mb-2">13–18 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">17 401₽</span>
              <span class="text-lg font-semibold text-red-600">10 285₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 1 -->
        <div class="rounded-2xl overflow-hidden bg-gray-50">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Выбор гостей</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,96 (202)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Колокола Ирландии ✓ Самостоятельно...</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 2 односпальные кровати</p>
            <p class="text-sm text-gray-500 mb-2">12–17 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">19 440₽</span>
              <span class="text-lg font-semibold text-red-600">15 552₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Суперхозяин</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,88 (17)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Апартаменты KeyGo #0130 ключ к центру...</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 1 кровать 152x203 см</p>
            <p class="text-sm text-gray-500 mb-2">11–16 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">20 298₽</span>
              <span class="text-lg font-semibold text-red-600">16 234₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Выбор гостей</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,93 (14)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Студия KeyGo #0137 Апарт Отель</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 1 кровать 152x203 см</p>
            <p class="text-sm text-gray-500 mb-2">13–18 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">17 401₽</span>
              <span class="text-lg font-semibold text-red-600">10 285₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 1 -->
        <div class="rounded-2xl overflow-hidden bg-gray-50">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Выбор гостей</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,96 (202)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Колокола Ирландии ✓ Самостоятельно...</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 2 односпальные кровати</p>
            <p class="text-sm text-gray-500 mb-2">12–17 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">19 440₽</span>
              <span class="text-lg font-semibold text-red-600">15 552₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Суперхозяин</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,88 (17)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Апартаменты KeyGo #0130 ключ к центру...</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 1 кровать 152x203 см</p>
            <p class="text-sm text-gray-500 mb-2">11–16 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">20 298₽</span>
              <span class="text-lg font-semibold text-red-600">16 234₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
          <div class="relative">
            <img src="https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson" alt="Квартира" class="w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">Выбор гостей</div>
            <button class="absolute top-2 right-2 p-2 bg-white rounded-full">
              <i class="far fa-heart text-gray-600"></i>
            </button>
          </div>
          <div class="p-4">
            <h3 class="font-semibold mb-1">Квартира, Ереван</h3>
            <div class="flex items-center text-sm text-gray-600 mb-2">
              <i class="fas fa-star text-yellow-500 mr-1"></i>
              <span>4,93 (14)</span>
            </div>
            <p class="text-sm text-gray-700 mb-2 line-clamp-2">Студия KeyGo #0137 Апарт Отель</p>
            <p class="text-sm text-gray-500 mb-2">1 спальня • 1 кровать 152x203 см</p>
            <p class="text-sm text-gray-500 mb-2">13–18 дек.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500 line-through">17 401₽</span>
              <span class="text-lg font-semibold text-red-600">10 285₽</span>
              <span class="text-sm text-gray-600">за 5 ночей</span>
            </div>
          </div>
        </div>

        <!-- Добавьте больше карточек по аналогии -->
      </div>
    </div>

    <!-- Right Panel: Map -->
    <div class="flex-1 -order-1 lg:order-1 lg:relative fixed w-full lg:z-0 z-[-1]">

      <!-- Placeholder for map -->
      <div
        class="w-full bg-gray-200 flex items-center justify-center lg:rounded-2xl sticky top-24 h-[calc(51vh)] lg:h-[calc(100vh-120px)]"
      >
        <div class="text-center">
          <div class="text-gray-500 mb-2">Карта</div>
          <div class="text-xs text-gray-400">Здесь будет карта с метками цен</div>
        </div>
      </div>
    </div>

  </main>

  <!-- Footer -->
  <footer class="bg-white border-t mt-8 py-6">
    <div class="container mx-auto px-4 text-center text-sm text-gray-600">
      <p>© 2025 Airbnb, Inc. Условия • Конфиденциальность • Карта сайта</p>
    </div>
  </footer>
</template>

<style scoped>

</style>
