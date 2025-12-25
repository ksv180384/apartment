<script setup>

const { params } = defineProps({
  params: { type: Object, required: true },
});
</script>

<template>
  <div class="grid grid-cols-2 gap-4 auto-rows-min">
    <template v-if="params.building_name">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Название ЖК</div>
        <div class="font-medium lg:text-lg">{{ params.building_name }}</div>
      </div>
    </template>

    <template v-if="params.developer">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Застройщик</div>
        <div class="font-medium lg:text-lg">{{ params.developer }}</div>
      </div>
    </template>

    <template v-if="params.building_floors">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Этажей в доме</div>
        <div class="font-medium lg:text-lg">{{ params.building_floors }}</div>
      </div>
    </template>

    <template v-if="params.floor">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Этаж</div>
        <div class="font-medium lg:text-lg">{{ params.floor }}</div>
      </div>
    </template>

    <template v-if="params.apartments_total">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Квартир в доме</div>
        <div class="font-medium lg:text-lg">{{ params.apartments_total }}</div>
      </div>
    </template>

    <template v-if="params.area_living">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Жилая площадь</div>
        <div class="font-medium lg:text-lg">{{ params.area_living }} м²</div>
      </div>
    </template>

    <template v-if="params.area_kitchen">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Площадь кухни</div>
        <div class="font-medium lg:text-lg">{{ params.area_kitchen }} м²</div>
      </div>
    </template>

    <template v-if="params.rooms_total">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Количество комнат</div>
        <div class="font-medium lg:text-lg">{{ params.rooms_total }}</div>
      </div>
    </template>

    <template v-if="params.bathrooms_total">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Количество санузлов</div>
        <div class="font-medium lg:text-lg">{{ params.bathrooms_total }}</div>
      </div>
    </template>

    <template v-if="params.building_class?.name">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Класс жилья</div>
        <div class="font-medium lg:text-lg">{{ params.building_class.name }}</div>
      </div>
    </template>

    <template v-if="params.ceiling_height">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Высота потолков</div>
        <div class="font-medium lg:text-lg">{{ params.ceiling_height }}</div>
      </div>
    </template>

    <template v-if="params.has_balcony">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Балкон</div>
        <div class="font-medium lg:text-lg">Есть</div>
      </div>
    </template>

    <template v-if="params.has_loggia">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Лоджия</div>
        <div class="font-medium lg:text-lg">Есть</div>
      </div>
    </template>

    <template v-if="params.building_type?.name">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип дома</div>
        <div class="font-medium lg:text-lg">{{ params.building_type.name }}</div>
      </div>
    </template>

    <template v-if="params.finishing_type?.name">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип отделки</div>
        <div class="font-medium lg:text-lg">{{ params.finishing_type.name }}</div>
      </div>
    </template>

    <template v-if="params.completion_date">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Дата сдачи дома</div>
        <div class="font-medium lg:text-lg">{{ params.completion_date }}</div>
      </div>
    </template>

    <template v-if="params.has_mortgage">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Ипотека</div>
        <div class="font-medium lg:text-lg">От застройщика</div>
      </div>
    </template>

    <template v-if="params.has_installment">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Рассрочка</div>
        <div class="font-medium lg:text-lg">От застройщика</div>
      </div>
    </template>
  </div>
</template>

<style scoped>

</style>
