<script setup>

const { params } = defineProps({
  params: { type: Object, required: true },
});
</script>

<template>
  <div class="grid grid-cols-2 gap-4 auto-rows-min">
    <template v-if="params.garage_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип гаража</div>
        <div class="font-medium lg:text-lg">{{ params.garage_type.name }}</div>
      </div>
    </template>

    <template v-if="params.ownership_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Форма собственности</div>
        <div class="font-medium lg:text-lg">{{ params.ownership_type.name }}</div>
      </div>
    </template>

    <template v-if="params.gate_height">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Высота ворот</div>
        <div class="font-medium lg:text-lg">{{ params.gate_height }}</div>
      </div>
    </template>

    <template v-if="params.gate_width_formatted">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Ширина ворот</div>
        <div class="font-medium lg:text-lg">{{ params.gate_width_formatted }}</div>
      </div>
    </template>

    <template v-if="params.vehicle_capacity">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Вместимость (количество машин)</div>
        <div class="font-medium lg:text-lg">{{ params.vehicle_capacity }}</div>
      </div>
    </template>

    <template v-if="params.equipment">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Оборудование</div>
        <div class="font-medium lg:text-lg">{{ params.equipment }}</div>
      </div>
    </template>

    <template v-if="params.has_electricity !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Электричество</div>
        <div class="font-medium lg:text-lg">{{ params.has_electricity ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_heating !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Отопление</div>
        <div class="font-medium lg:text-lg">{{ params.has_heating ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_water_supply !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Водоснабжение</div>
        <div class="font-medium lg:text-lg">{{ params.has_water_supply ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_sewage !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Канализация</div>
        <div class="font-medium lg:text-lg">{{ params.has_sewage ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_ventilation !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Вентиляция</div>
        <div class="font-medium lg:text-lg">{{ params.has_ventilation ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>
  </div>
</template>

<style scoped>

</style>
