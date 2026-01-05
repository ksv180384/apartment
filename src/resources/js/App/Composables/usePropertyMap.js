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

  // Добавляем функцию для прокрутки к карточке
  const scrollToProperty = (id) => {
    const element = document.getElementById(`property-${id}`);
    if (element) {
      // Плавная прокрутка к элементу
      element.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
        inline: 'nearest'
      });

      // Добавляем подсветку (опционально)
      element.classList.add('highlight');
      setTimeout(() => {
        element.classList.remove('highlight');
      }, 2000);
    }
  };

  const markerClick = (id) => {
    // Прокручиваем к карточке при клике на маркер
    scrollToProperty(id);

    // Также можно добавить дополнительную логику выделения
    // markers.value = markers.value.map(item => ({
    //   ...item,
    //   active: item.id === id
    // }));
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
      // console.log('Properties updated, markers refreshed:', newProperties);
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
