<script setup>

const { params } = defineProps({
  params: { type: Object, required: true },
});
</script>

<template>
  <div class="grid grid-cols-2 gap-4 auto-rows-min">
    <template v-if="params.commercial_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип</div>
        <div class="font-medium lg:text-lg">{{ params.commercial_type.name }}</div>
      </div>
    </template>

    <template v-if="params.purpose">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Назначение</div>
        <div class="font-medium lg:text-lg">{{ params.purpose.name }}</div>
      </div>
    </template>

    <template v-if="params.layout_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Планировка</div>
        <div class="font-medium lg:text-lg">{{ params.layout_type.name }}</div>
      </div>
    </template>

    <template v-if="params.has_ventilation !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Вентиляция</div>
        <div class="font-medium lg:text-lg">{{ params.has_ventilation ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_air_conditioning !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Кондиционирование</div>
        <div class="font-medium lg:text-lg">{{ params.has_air_conditioning ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_security !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Охрана</div>
        <div class="font-medium lg:text-lg">{{ params.has_security ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_parking !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Парковка</div>
        <div class="font-medium lg:text-lg">{{ params.has_parking ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.parking_spaces !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Количество парковочных мест</div>
        <div class="font-medium lg:text-lg">{{ params.parking_spaces ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>
  </div>
</template>

<style scoped>

</style>
