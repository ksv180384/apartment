<script setup>
import DefaultLayout from '@/App/Layouts/DefaultLayout.vue';
</script>

<template>
  <default-layout>
    <div>
      <section class="relative bg-gradient-to-r from-gray-900 to-gray-800 text-white rounded-xl overflow-hidden">
        <div class="absolute inset-0 z-0">
          <div class="absolute inset-0 bg-black opacity-50"></div>
          <img src="/images/nizkii-ugol-vysotnyh-raznyh-zdanii_2.jpg"
               alt="Недвижимость" class="w-full h-full object-cover">
        </div>

        <div class="container mx-auto lg:px-10 px-4 py-24 relative z-[1]">
          <div class="max-w-2xl">
            <span class="inline-block bg-violet-600 text-white px-4 py-1 rounded-full text-sm font-medium mb-4">Ваш триумф в мире недвижимости</span>
            <h1 class="hero-title text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Найдем дом вашей мечты</h1>
            <p class="text-xl mb-8 text-gray-200">
              Агентство недвижимости «Триумф»<br/>
              Ваш надежный проводник в мире покупки, продажи и аренды жилья. Помогаем людям обрести свой дом.</p>
            <div class="flex flex-wrap gap-4">

            </div>
          </div>
        </div>
      </section>

      <!-- Преимущества -->
      <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
          <div class="text-center mb-12">
            <h2 class="section-title text-3xl font-bold text-gray-800 mb-4">Почему выбирают нас</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Мы предлагаем комплексный подход к работе с недвижимостью и гарантируем безопасность всех сделок</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-violet-50 rounded-xl">
              <div class="w-16 h-16  rounded-full flex items-center justify-center mx-auto mb-4">
                <img src="/images/reliability_17656416.png"
                     alt="Надежность"
                     class="w-full h-full object-cover"
                />
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Надежность</h3>
              <p class="text-gray-600">Гарантируем юридическую чистоту всех сделок и полную безопасность</p>
            </div>

            <div class="text-center p-6 bg-violet-50 rounded-xl">
              <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <img src="/images/deal_18845940.png"
                     alt="Сделка под ключ"
                     class="w-full h-full object-cover"
                />
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Сделка под ключ</h3>
              <p class="text-gray-600">Сопроводим на каждом этапе сделки</p>
            </div>

            <div class="text-center p-6 bg-violet-50 rounded-xl">
              <div class="w-16 h-16  rounded-full flex items-center justify-center mx-auto mb-4">
                <img src="/images/immersive-vr_11739740.png"
                     alt="Индивидуальный подход"
                     class="w-full h-full object-cover"
                />
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Индивидуальный подход</h3>
              <p class="text-gray-600">Каждому клиенту - персональный менеджер и оптимальные решения</p>
            </div>

          </div>
        </div>
      </section>

      <!-- Популярные объекты -->
      <section id="catalog" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="flex justify-between items-center mb-12">
            <div>
              <h2 class="section-title text-3xl font-bold text-gray-800 mb-4">Популярные объекты</h2>
              <p class="text-gray-600">Самые востребованные предложения этого месяца</p>
            </div>
            <a href="#" class="hidden md:inline-flex items-center text-yellow-700 font-bold hover:text-yellow-800">
              <span>Весь каталог</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Объект 1 -->
            <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
              <div class="relative">
                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=1471&q=80"
                     alt="Квартира в центре" class="w-full h-64 object-cover">
                <div class="absolute top-4 left-4 bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-bold">Новостройка</div>
                <div class="absolute top-4 right-4 bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-bold">3 комнаты</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Апартаменты в центре города</h3>
                <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt text-yellow-700 mr-2"></i>Центральный район, ул. Ленина, 45</p>
                <div class="flex justify-between items-center mb-4">
                  <div class="flex space-x-4 text-gray-600">
                    <span><i class="fas fa-expand mr-1"></i> 85 м²</span>
                    <span><i class="fas fa-bed mr-1"></i> 3</span>
                    <span><i class="fas fa-bath mr-1"></i> 2</span>
                  </div>
                  <div class="text-2xl font-bold text-gray-800">12 500 000 ₽</div>
                </div>
                <button class="w-full btn-primary text-white font-bold py-3 rounded-lg">Подробнее</button>
              </div>
            </div>

            <!-- Объект 2 -->
            <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
              <div class="relative">
                <img src="https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                     alt="Загородный дом" class="w-full h-64 object-cover">
                <div class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">За городом</div>
                <div class="absolute top-4 right-4 bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-bold">2 этажа</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Загородный дом с участком</h3>
                <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt text-yellow-700 mr-2"></i>Пригород, коттеджный посёлок "Сосновый бор"</p>
                <div class="flex justify-between items-center mb-4">
                  <div class="flex space-x-4 text-gray-600">
                    <span><i class="fas fa-expand mr-1"></i> 150 м²</span>
                    <span><i class="fas fa-bed mr-1"></i> 4</span>
                    <span><i class="fas fa-tree mr-1"></i> 10 соток</span>
                  </div>
                  <div class="text-2xl font-bold text-gray-800">24 800 000 ₽</div>
                </div>
                <button class="w-full btn-primary text-white font-bold py-3 rounded-lg">Подробнее</button>
              </div>
            </div>

            <!-- Объект 3 -->
            <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
              <div class="relative">
                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                     alt="Студия" class="w-full h-64 object-cover">
                <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">Студия</div>
                <div class="absolute top-4 right-4 bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-bold">С ремонтом</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Студия с дизайнерским ремонтом</h3>
                <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt text-yellow-700 mr-2"></i>Престижный район, ЖК "Европейский"</p>
                <div class="flex justify-between items-center mb-4">
                  <div class="flex space-x-4 text-gray-600">
                    <span><i class="fas fa-expand mr-1"></i> 42 м²</span>
                    <span><i class="fas fa-warehouse mr-1"></i> паркинг</span>
                    <span><i class="fas fa-dumbbell mr-1"></i> фитнес</span>
                  </div>
                  <div class="text-2xl font-bold text-gray-800">8 900 000 ₽</div>
                </div>
                <button class="w-full btn-primary text-white font-bold py-3 rounded-lg">Подробнее</button>
              </div>
            </div>
          </div>

          <div class="text-center mt-12 md:hidden">
            <a href="#" class="btn-primary text-white font-bold py-3 px-8 rounded-lg inline-flex items-center">
              <span>Весь каталог</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </section>
    </div>
  </default-layout>
</template>

<style scoped>

</style>

