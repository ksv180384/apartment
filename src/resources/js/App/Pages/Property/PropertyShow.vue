<script setup>
import { computed, ref } from 'vue';
import FsLightbox from 'fslightbox-vue';

import DefaultLayout from '@/App/Layouts/DefaultLayout.vue';
import YaMapPoint from '@/App/Components/YaMapPoint.vue';
import SubDataGarazi from '@/App/Pages/Property/Components/SubDataGarazi.vue';
import SubDataKommerceskaiaNedvizimost from '@/App/Pages/Property/Components/SubDataKommerceskaiaNedvizimost.vue';
import SubDataKvartiry from '@/App/Pages/Property/Components/SubDataKvartiry.vue';
import SubDataNovostroiki from '@/App/Pages/Property/Components/SubDataNovostroiki.vue';
import SubDataUchastki from '@/App/Pages/Property/Components/SubDataUchastki.vue';
import SubDataDoma from '@/App/Pages/Property/Components/SubDataDoma.vue';

const { property } = defineProps({
  property: { type: Object, required: true },
});

const toggler = ref(false);
const slide = ref(4);
const sources = ref(property.media.map(item => {
  return item.path;
}));

const subDataComponent = computed(() => {
  if (['novostroiki'].includes(property.property_type?.slug)) {
    return SubDataNovostroiki;
  }
  if (['kvartiry', 'komnaty'].includes(property.property_type?.slug)) {
    return SubDataKvartiry;
  }
  else if(property.property_type?.slug === 'doma'){
    return SubDataDoma;
  }
  else if(property.property_type?.slug === 'uchastki'){
    return SubDataUchastki;
  }
  else if(property.property_type?.slug === 'kommerceskaia-nedvizimost'){
    return SubDataKommerceskaiaNedvizimost;
  }
  else if(property.property_type?.slug === 'garazi'){
    return SubDataGarazi;
  }
});

const showImage = (imageIndex) => {
  slide.value = imageIndex + 1;
  toggler.value = !toggler.value
}

console.log(property)
</script>

<template>
  <default-layout>
    <div class="w-full flex flex-col gap-2">
      <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
        <div class="flex flex-col lg:px-0 px-4 gap-2 top-20 xl:sticky self-start max-h-screen overflow-y-auto">
          <img
            :src="property.main_image_url"
            class="rounded-lg cursor-pointer"
            :alt="property.title"
            @click="showImage(0)"
          />
          <div class="flex flex-row flex-wrap justify-start gap-2">
            <FsLightbox
              :toggler="toggler"
              :sources="sources"
              :slide="slide"
            />
            <template v-for="(img, index) in property.media_mini" :key="property.id">
              <img
                :src="img.path"
                class="w-[194px] rounded-lg cursor-pointer"
                @click="showImage(index + 1)"
              />
            </template>
          </div>
        </div>

        <div class="flex flex-col gap-3 flex-1 lg:px-0 px-4">
          <div class="flex flex-col gap-3">
            <h1 class="font-semibold text-2xl lg:text-3xl">{{ property.title }}</h1>
            <div class="flex items-center gap-2 text-sm lg:text-lg text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-width="1.5"><path d="m18 8l.949.316c.99.33 1.485.495 1.768.888s.283.915.283 1.958v5.667c0 1.29 0 1.936-.34 2.351c-.115.14-.255.26-.413.35c-.465.267-1.102.16-2.375-.051c-1.256-.21-1.884-.314-2.507-.262q-.329.027-.65.097c-.61.134-1.185.421-2.334.996c-1.5.75-2.25 1.125-3.048 1.24q-.36.052-.726.052c-.807-.002-1.595-.265-3.172-.79l-.384-.128c-.99-.33-1.485-.495-1.768-.888S3 18.88 3 17.838v-4.93c0-1.659 0-2.488.488-2.934a1.5 1.5 0 0 1 .281-.203c.578-.322 1.365-.06 2.938.465"/><path d="M6 7.7C6 4.552 8.686 2 12 2s6 2.552 6 5.7c0 3.124-1.915 6.769-4.903 8.072a2.76 2.76 0 0 1-2.194 0C7.915 14.47 6 10.824 6 7.7Z"/><circle cx="12" cy="8" r="2"/></g>
              </svg>
              {{ property.address.full_address }}
            </div>
          </div>

          <div class="grid grid-cols-1 xl:grid-cols-2">
            <div class="w-fit">
              <div class="font-semibold inline-block bg-violet-700 text-violet-50 px-2 lg:px-4 py-1 lg:py-2 rounded-lg">
                {{ property.category.name }}
              </div>
            </div>
            <div class="flex flex-row gap-2 justify-between lg:justify-end items-end flex-grow">
              <div class="flex flex-row gap-2 items-end whitespace-nowrap">
                <span class="text-sm text-gray-800 font-semibold">{{ property.property_type.name }}</span>
                <span class="text-lg text-gray-600">{{ property.features.area_total }}</span>
              </div>
              <span class="font-semibold lg:font-bold text-3xl lg:text-4xl whitespace-nowrap">{{ property.price }}</span>
            </div>
          </div>

          <div>
            <div class="whitespace-pre-line p-2 bg-violet-50 rounded-lg">
              {{ property.description }}
            </div>
          </div>

          <div>
            <component
              :is="subDataComponent"
              v-if="subDataComponent"
              :params="property.sub_data"
            />
          </div>
        </div>
      </div>

      <div class="rounded-lg overflow-hidden">
        <YaMapPoint
          v-if="property?.address?.coordinates"
          :coordinates="property.coordinates"
        />
      </div>
    </div>
  </default-layout>
</template>

<style scoped>

</style>
