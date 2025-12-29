<script setup>

const { params } = defineProps({
  params: { type: Object, required: true },
});
</script>

<template>
  <div class="grid grid-cols-2 gap-4 auto-rows-min">
    <template v-if="params.land_area">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Площадь участка</div>
        <div class="font-medium lg:text-lg">{{ params.land_area }} сот.</div>
      </div>
    </template>

    <template v-if="params.land_category">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Категория земли</div>
        <div class="font-medium lg:text-lg">{{ params.land_category }}</div>
      </div>
    </template>

    <template v-if="params.permitted_use">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Разрешенное использование</div>
        <div class="font-medium lg:text-lg">{{ params.permitted_use }}</div>
      </div>
    </template>

    <template v-if="params.relief">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Рельеф</div>
        <div class="font-medium lg:text-lg">{{ params.relief }}</div>
      </div>
    </template>

    <template v-if="params.soil_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип почвы</div>
        <div class="font-medium lg:text-lg">{{ params.soil_type }}</div>
      </div>
    </template>

    <template v-if="params.has_utilities !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Коммуникации</div>
        <div class="font-medium lg:text-lg">{{ params.has_utilities ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_road_access !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Подъездные пути</div>
        <div class="font-medium lg:text-lg">{{ params.has_road_access ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_fence !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Ограждение</div>
        <div class="font-medium lg:text-lg">{{ params.has_fence ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>
  </div>
</template>

<style scoped>

</style>
