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
        :settings="{ placeholder: 'Введите адрес', searchResult: (val) => selectedInput = val[0]?.geometry?.coordinates ?? null, search: search }"
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

const emits = defineEmits(['selectAddress']);

//Можно использовать для различных преобразований
const map = shallowRef(null);
const selectedInput = ref([36.597014, 55.117082]);

// const suggest = ref('');
const mapWidth = ref('calc(100% - 10px)');
const mapCenter = ref([36.597014, 55.117082]);
const zoom = ref(12);
const settings = reactive({
  location: {
    center: mapCenter,
    zoom: zoom,
  },
  showScaleInCopyrights: true,
});

// Обработчик клика по карте
const onDragEnd = () => {
  mapCenter.value = selectedInput.value;
  console.log(selectedInput.value)
};

const search = (e) => {
  emits('selectAddress', e.params.text);
  zoom.value = 17;
}

const onResize = (e) => {
  console.log(e)
}

watch(
  () => selectedInput,
  () => {
    // Обнинск
    mapCenter.value = selectedInput.value;
    console.log(selectedInput.value)
  },
  { deep: true }
);
</script>
