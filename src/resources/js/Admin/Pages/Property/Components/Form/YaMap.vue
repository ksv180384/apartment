<script setup>
import { shallowRef, ref, watch, reactive } from 'vue';
import {
  YandexMap,
  YandexMapDefaultFeaturesLayer,
  YandexMapDefaultMarker,
  YandexMapDefaultSchemeLayer,
  YandexMapSearchControl,
  YandexMapControls,
} from 'vue-yandex-maps';

const { latitude, longitude } = defineProps({
  latitude: { type: Number, default: null },
  longitude: { type: Number, default: null }
});
const emits = defineEmits(['selectAddress', 'selectPosition']);

const initMapPosition = [latitude || 36.597014, longitude || 55.117082];
//Можно использовать для различных преобразований
const map = shallowRef(null);
const selectedInput = ref(initMapPosition);

// const suggest = ref('');
const mapWidth = ref('calc(100% - 10px)');
const mapCenter = ref(initMapPosition);
const zoom = ref(latitude ? 17 : 12);

const settings = reactive({
  location: {
    center: mapCenter,
    zoom: zoom,
  },
  showScaleInCopyrights: true,
});

// Обработчик клика по карте
const onDragEnd = async (e) => {
  selectedInput.value = e;

  // console.log(ymaps3.YMap)
  // console.log(map.value.zoom)

  emits('selectPosition', e);

};

const handleSearchResult = (results) => {
  if (results && results.length > 0) {
    const firstResult = results[0];
    if (firstResult.geometry?.coordinates) {
      selectedInput.value = firstResult.geometry.coordinates;
      // Также обновляем центр карты
      mapCenter.value = firstResult.geometry.coordinates;
      zoom.value = 17;
      emits('selectPosition', selectedInput.value);
    }
  }
};

const search = (e) => {
  // mapCenter.value = selectedInput.value;
  emits('selectAddress', e.params.text);
}

const onResize = (e) => {
  console.log(e)
}

watch(
  () => selectedInput,
  () => {
    // Обнинск
    mapCenter.value = selectedInput.value;
    zoom.value = map.value.zoom;
  },
  { deep: true }
);
</script>

<template>
  <yandex-map
    v-model="map"
    :settings="settings"
    :width="mapWidth"
    height="500px"
    onresize="onResize"
  >
    <yandex-map-default-scheme-layer/>
    <yandex-map-default-features-layer/>
    <yandex-map-controls :settings="{ position: 'top left' }">
      <yandex-map-search-control
        :settings="{
        placeholder: 'Введите адрес',
        searchResult: handleSearchResult,
        search: search
      }"
      />
    </yandex-map-controls>

    <yandex-map-default-marker
      v-if="selectedInput"
      :settings="{
        coordinates: selectedInput,
        title: 'Результат поиска',
        draggable: true,
        onDragEnd
      }"
    />

  </yandex-map>
</template>
