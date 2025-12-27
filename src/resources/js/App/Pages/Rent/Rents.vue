<script setup>
import { watch } from 'vue';
import { usePropertyMap } from '@/App/Composables/usePropertyMap';

import YaMapList from '@/App/Components/YaMapList.vue';
import DefaultLayout from '@/App/Layouts/DefaultLayout.vue';
import PropertyCard from '@/App/Pages/Property/Components/PropertyCard.vue';
import AppFilter from "@/App/Components/AppFilter.vue";


const { propertyTypes, properties, pagination } = defineProps({
  propertyTypes: { type: Array, default: [] },
  properties: { type: Object, required: true },
  pagination: { type: Object, required: true },
});

const {
  hoverMarker,
  markers,
  onMouseEnterCard,
  onMouseLeaveCard,
  markerMouseEnter,
  markerMouseLeave,
  markerClick,
  updateMarkers
} = usePropertyMap(properties);

watch(
  () => properties,
  (newVal) => {
    updateMarkers(newVal);
  },
  { deep: true }
);
</script>

<template>
  <default-layout>
    <template #headerRight>
      <AppFilter :property-types="propertyTypes"/>
    </template>

    <!-- Left Panel: Listings -->
    <div class="lg:w-1/2 bg-white lg:mt-0 mt-[50vh] rounded-2xl overflow-hidden z-[1]">
      <!-- Listing Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 lg:px-2 px-6 gap-6 lg:pt-2 pb-2 pt-8">

        <template v-for="property in properties" :key="property.id">

          <property-card
            :property="property"
            :hover-marker="hoverMarker"
            @mouseEnterCard="onMouseEnterCard"
            @mouseLeaveCard="onMouseLeaveCard"
          />

        </template>

      </div>
    </div>

    <!-- Right Panel: Map -->
    <div class="flex-1 -order-1 lg:order-1 lg:relative fixed w-full z-[0]">

      <!-- Placeholder for map -->
      <div
        class="w-full bg-gray-200 flex items-center justify-center lg:rounded-2xl sticky top-24 h-[calc(51vh)] lg:h-[calc(100vh-120px)] overflow-hidden"
      >
        <YaMapList
          :markers="markers"
          @markerMouseEnter="markerMouseEnter"
          @markerMouseLeave="markerMouseLeave"
          @markerClick="markerClick"
        />
      </div>
    </div>
  </default-layout>

</template>

<style scoped>

</style>
