import { ref, watch } from 'vue';

export function usePropertyMap(initialProperties) {
  const hoverMarker = ref(0);

  const markers = ref(
    initialProperties.map(item => ({
      id: item.id,
      coordinates: item.coordinates,
      price: item.price,
      active: false,
      hover: false
    }))
  );

  const updateMarkers = (items) => {
    markers.value = items.map(item => ({
      id: item.id,
      coordinates: item.coordinates,
      price: item.price,
      active: false,
      hover: false
    }));
  }

  const onMouseEnterCard = (id) => {
    markers.value = markers.value.map(item => ({
      ...item,
      active: item.id === id
    }));
  };

  const onMouseLeaveCard = () => {
    markers.value = markers.value.map(item => ({
      ...item,
      active: false
    }));
  };

  const markerMouseEnter = (id) => {
    markers.value = markers.value.map(item => ({
      ...item,
      hover: item.id === id
    }));
    hoverMarker.value = id;
  };

  const markerMouseLeave = () => {
    markers.value = markers.value.map(item => ({
      ...item,
      hover: false
    }));
    hoverMarker.value = 0;
  };

  const markerClick = (id) => {
    // логика клика по маркеру
    console.log('Marker clicked:', id);
  };

  watch(
    () => initialProperties,
    (newProperties) => {
      markers.value = newProperties.map(item => ({
        id: item.id,
        coordinates: item.coordinates,
        price: item.price,
        active: false,
        hover: false
      }));
      console.log('Properties updated, markers refreshed:', newProperties);
    },
    { deep: true, immediate: true }
  );

  return {
    hoverMarker,
    markers,
    onMouseEnterCard,
    onMouseLeaveCard,
    markerMouseEnter,
    markerMouseLeave,
    markerClick,
    updateMarkers
  };
}
