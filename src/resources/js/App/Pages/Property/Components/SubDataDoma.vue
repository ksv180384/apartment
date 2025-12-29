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

    <template v-if="params.building_floors">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Этажность дома</div>
        <div class="font-medium lg:text-lg">{{ params.building_floors }}</div>
      </div>
    </template>

    <template v-if="params.wall_material">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Материал стен</div>
        <div class="font-medium lg:text-lg">{{ params.wall_material }}</div>
      </div>
    </template>

    <template v-if="params.foundation_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип фундамента</div>
        <div class="font-medium lg:text-lg">{{ params.foundation_type }}</div>
      </div>
    </template>

    <template v-if="params.roof_material">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Материал крыши</div>
        <div class="font-medium lg:text-lg">{{ params.roof_material }}</div>
      </div>
    </template>

    <template v-if="params.finishing_type">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Тип отделки</div>
        <div class="font-medium lg:text-lg">{{ params.finishing_type.name }}</div>
      </div>
    </template>

    <template v-if="params.area_living">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Жилая площадь в м²</div>
        <div class="font-medium lg:text-lg">{{ params.area_living }}</div>
      </div>
    </template>

    <template v-if="params.bedrooms_total">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Количество спален</div>
        <div class="font-medium lg:text-lg">{{ params.bedrooms_total }}</div>
      </div>
    </template>

    <template v-if="params.bathrooms_total">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Количество санузлов</div>
        <div class="font-medium lg:text-lg">{{ params.bathrooms_total }}</div>
      </div>
    </template>

    <template v-if="params.ceiling_height">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Высота потолков</div>
        <div class="font-medium lg:text-lg">{{ params.ceiling_height }}</div>
      </div>
    </template>

    <!-- Boolean поля с "Есть/Нет" -->
    <template v-if="params.has_electricity !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Электричество</div>
        <div class="font-medium lg:text-lg">{{ params.has_electricity ? 'Есть' : 'Нет' }}</div>
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

    <template v-if="params.has_heating !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Отопление</div>
        <div class="font-medium lg:text-lg">{{ params.has_heating ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_gas !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Газ</div>
        <div class="font-medium lg:text-lg">{{ params.has_gas ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_internet !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Интернет</div>
        <div class="font-medium lg:text-lg">{{ params.has_internet ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_phone_line !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Телефонная линия</div>
        <div class="font-medium lg:text-lg">{{ params.has_phone_line ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_garage !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Гараж</div>
        <div class="font-medium lg:text-lg">{{ params.has_garage ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_basement !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Подвал</div>
        <div class="font-medium lg:text-lg">{{ params.has_basement ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_attic !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Чердак/мансарда</div>
        <div class="font-medium lg:text-lg">{{ params.has_attic ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_balcony !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Балкон</div>
        <div class="font-medium lg:text-lg">{{ params.has_balcony ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_terrace !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Терраса</div>
        <div class="font-medium lg:text-lg">{{ params.has_terrace ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_veranda !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Веранда</div>
        <div class="font-medium lg:text-lg">{{ params.has_veranda ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_pool !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Бассейн</div>
        <div class="font-medium lg:text-lg">{{ params.has_pool ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_sauna !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Сауна/баня</div>
        <div class="font-medium lg:text-lg">{{ params.has_sauna ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_fireplace !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Камин</div>
        <div class="font-medium lg:text-lg">{{ params.has_fireplace ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_fence !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Ограждение</div>
        <div class="font-medium lg:text-lg">{{ params.has_fence ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_garden !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Сад</div>
        <div class="font-medium lg:text-lg">{{ params.has_garden ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_vegetable_garden !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Огород</div>
        <div class="font-medium lg:text-lg">{{ params.has_vegetable_garden ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_lawn !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Газон</div>
        <div class="font-medium lg:text-lg">{{ params.has_lawn ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_playground !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Детская площадка</div>
        <div class="font-medium lg:text-lg">{{ params.has_playground ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>

    <template v-if="params.has_parking !== undefined">
      <div class="p-1 rounded-lg">
        <div class="text-sm text-gray-500">Парковка</div>
        <div class="font-medium lg:text-lg">{{ params.has_parking ? 'Есть' : 'Нет' }}</div>
      </div>
    </template>
  </div>
</template>

<style scoped>

</style>
