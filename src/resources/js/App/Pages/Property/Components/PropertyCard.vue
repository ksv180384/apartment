<script setup>
import { Link } from '@inertiajs/vue3';

const { properties, pagination } = defineProps({
  property: { type: Object, required: true },
  hoverMarker: { type: Number, default: null },
});
const emits = defineEmits(['mouseEnterCard', 'mouseLeaveCard']);

const onMouseEnterCard = (id) => {
  emits('mouseEnterCard', id);
}

const onMouseLeaveCard = () => {
  emits('mouseLeaveCard');
}
</script>

<template>
  <div
    :id="`property-${property.id}`"
    class="property-card rounded-2xl overflow-hidden bg-violet-50 transition-all duration-300 ease-out"
    :class="[
              hoverMarker === property.id ? 'shadow-[0_0_0_4px] shadow-violet-300' : ''
            ]"
    @mouseenter="onMouseEnterCard(property.id)"
    @mouseleave="onMouseLeaveCard()"
  >
    <div class="relative overflow-hidden">
      <img :src="property.image_main" :alt="property.title" class="property-card-img w-full h-48 object-cover transition-transform duration-500 ease-out">
      <div class="absolute top-2 left-2 text-violet-700 bg-violet-100 px-2 py-1 rounded-full text-xs font-medium">
        #{{ property.id }}
      </div>
    </div>
    <div class="p-4">
      <h3 class="font-semibold mb-1">
        <Link :href="route('properties.show', { id: property.id })">{{ property.title }}</Link>
      </h3>
      <div class="flex items-center text-sm text-gray-600 mb-2">
        <span>{{ property.property_type }}</span>
      </div>
      <p class="text-sm text-gray-700 mb-2 line-clamp-2">{{ property.address }}</p>
      <p class="text-sm text-gray-500 mb-2"></p>
      <div class="flex items-center justify-between">
        <span class="text-sm text-gray-500 font-bold">{{ property.area_total_formatted }}</span>
        <span class="text-lg font-semibold bg-violet-500 text-violet-50 px-2 rounded-lg">{{ property.price }}</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.property-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 40px -12px rgba(124, 58, 237, 0.2);
}
.property-card:hover .property-card-img {
  transform: scale(1.05);
}
</style>
