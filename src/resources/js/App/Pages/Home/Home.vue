<script setup>
import DefaultLayout from '@/App/Layouts/DefaultLayout.vue';
import PropertyCard from '@/App/Pages/Property/Components/PropertyCard.vue';

const { lastProperties, seo } = defineProps({
  lastProperties: { type: Array, default: [] },
  seo: {
    type: Object,
    default: () => ({
      title: 'Агентство недвижимости "Триумф" - Купить, продать, арендовать жилье',
      description: 'Надежное агентство недвижимости "Триумф". Помогаем купить, продать или арендовать квартиру, дом, коммерческую недвижимость. Юридическая чистота сделок, сопровождение "под ключ".',
      keywords: 'недвижимость, купить квартиру, продать квартиру, аренда жилья, агентство недвижимости, Триумф',
      canonical: window.location.origin,
    })
  }
});
</script>

<template>
  <default-layout :seo="seo">
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
      <section class="py-16 bg-gray-50 rounded-xl">
        <div class="container mx-auto px-4">
          <div class="flex justify-between items-center mb-12">
            <div>
              <h2 class="section-title text-3xl font-bold text-gray-800 mb-4">Последние предложения</h2>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <template v-for="lastProperty in lastProperties">
              <property-card
                :property="lastProperty"
              />
            </template>

          </div>

        </div>
      </section>

    </div>
  </default-layout>
</template>

<style scoped>

</style>

