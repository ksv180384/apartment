<script setup>
import { shallowRef, ref, reactive } from 'vue';
import {
  YandexMap,
  YandexMapDefaultFeaturesLayer,
  YandexMapDefaultSchemeLayer,
  YandexMapMarker
} from 'vue-yandex-maps';

const { markers } = defineProps({
  markers: { type: Array, default: [] }
});
const emits = defineEmits(['markerMouseEnter', 'markerMouseLeave', 'markerClick']);

const mapWidth = ref('100%');
const map = shallowRef(null);
const initMapPosition = [36.597014, 55.117082];
const mapCenter = ref(initMapPosition);
const zoom = ref(12);

const settings = reactive({
  location: {
    center: mapCenter,
    zoom: zoom,
  },
  showScaleInCopyrights: true,
});

// Обработчик наведения мыши на маркер
const handleMouseEnter = (markerId) => {
  emits('markerMouseEnter', markerId);
};

// Обработчик ухода мыши с маркера
const handleMouseLeave = (markerId) => {
  emits('markerMouseLeave', markerId);
};

const handleMarkerClick = (markerId) => {
  emits('markerClick', markerId);
};
</script>

<template>
  <yandex-map
    v-model="map"
    :settings="settings"
    :width="mapWidth"
    height="100%"
  >
    <yandex-map-default-scheme-layer/>
    <yandex-map-default-features-layer/>

    <!-- Рендерим все маркеры из массива -->
    <yandex-map-marker
      v-for="marker in markers"
      :key="marker.id"
      :settings="{
        coordinates: marker.coordinates,
        zIndex: marker.active || marker.hover ? 2 : 1,
      }"
    >
      <div
        class="px-2 rounded-r-lg rounded-t-lg shadow-md border border-gray-300 font-semibold transition-all duration-300 cursor-pointer"
        :class="[
          marker.active ? 'bg-violet-500 text-white' : 'bg-white text-gray-700'
        ]
        "
        @mouseenter="handleMouseEnter(marker.id)"
        @mouseleave="handleMouseLeave(marker.id)"
        @click="handleMarkerClick(marker.id)"
      >
        {{ marker.price }}₽
      </div>
    </yandex-map-marker>
  </yandex-map>
</template>

<style scoped>

</style>
