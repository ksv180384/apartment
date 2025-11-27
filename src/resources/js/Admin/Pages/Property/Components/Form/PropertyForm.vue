<script setup>
import { ref, onMounted, nextTick, reactive, watch, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';

import YaMap from '@/Admin/Pages/Property/Components/Form/YaMap.vue';
import SubFormNovostroiki from '@/Admin/Pages/Property/Components/Form/SubFormNovostroiki.vue';
import SubFormDoma from '@/Admin/Pages/Property/Components/Form/SubFormDoma.vue';
import SubFormUcastki from '@/Admin/Pages/Property/Components/Form/SubFormUcastki.vue';
import SubFormKommerceskaiaNedvizimost from '@/Admin/Pages/Property/Components/Form/SubFormKommerceskaiaNedvizimost.vue';
import SubFormGarazi from '@/Admin/Pages/Property/Components/Form/SubFormGarazi.vue';

const props = defineProps({
  property: { type: Object, default: null },
  categories: { type: Array, default: [] },
  propertyTypes: { type: Array, default: [] },
  conditions: { type: Array, default: [] },
  repairTypes: { type: Array, default: [] },
  buildingClasses: { type: Array, default: [] },
  buildingTypes: { type: Array, default: [] },
  finishingTypes: { type: Array, default: [] },
  commercialTypes: { type: Array, default: [] },
  purposes: { type: Array, default: [] },
  layoutTypes: { type: Array, default: [] },
  garageTypes: { type: Array, default: [] },
  ownershipTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} }
});
const emits = defineEmits(['submit']);

const refForm = ref();
const refInputName = ref();

const propertyTypeActive = ref(null);
const additionalFieldsConfig = {
  novostroiki: {
    completion_date: props.property?.title || '',
    building_name: props.property?.building_name || '',
    developer: props.property?.developer || '',
    building_class_id: props.property?.building_class_id || '',
    building_type_id: props.property?.building_type_id || '',
    building_floors: props.property?.building_floors || '',
    apartments_total: props.property?.apartments_total || '',
    finishing_type_id: props.property?.finishing_type_id || '',
    has_installment: props.property?.finishing_type_id || false,
    has_mortgage: props.property?.finishing_type_id || false,
  },
  kvartiry: {
    completion_date: props.property?.title || '',
    building_name: props.property?.building_name || '',
    developer: props.property?.developer || '',
    building_class_id: props.property?.building_class_id || '',
    building_type_id: props.property?.building_type_id || '',
    building_floors: props.property?.building_floors || '',
    apartments_total: props.property?.apartments_total || '',
    finishing_type_id: props.property?.finishing_type_id || '',
    has_installment: props.property?.finishing_type_id || false,
    has_mortgage: props.property?.finishing_type_id || false,
    has_balcony: props.property?.has_balcony  || false,
    has_loggia: props.property?.has_loggia  || false,
  },
  komnaty: {
    completion_date: props.property?.title || '',
    building_name: props.property?.building_name || '',
    developer: props.property?.developer || '',
    building_class_id: props.property?.building_class_id || '',
    building_type_id: props.property?.building_type_id || '',
    building_floors: props.property?.building_floors || '',
    apartments_total: props.property?.apartments_total || '',
    finishing_type_id: props.property?.finishing_type_id || '',
    has_installment: props.property?.finishing_type_id || false,
    has_mortgage: props.property?.finishing_type_id || false,
    has_balcony: props.property?.has_balcony  || false,
    has_loggia: props.property?.has_loggia  || false,
  },
  doma: {
    land_area: props.property?.land_area || '',
    bedrooms_total: props.property?.bedrooms_total || '',
    wall_material: props.property?.wall_material || '',
    roof_material: props.property?.roof_material || '',
    foundation_type: props.property?.foundation_type  || '',
    has_electricity: props.property?.has_electricity || false,
    has_water_supply: props.property?.has_water_supply || false,
    has_sewage: props.property?.has_sewage || false,
    has_heating: props.property?.has_heating || false,
    has_gas: props.property?.has_gas || false,
    has_internet: props.property?.has_internet || false,
    has_phone_line: props.property?.has_phone_line  || false,
    has_garage: props.property?.has_garage  || false,
    has_basement: props.property?.has_basement  || false,
    has_attic: props.property?.has_attic  || false,
    has_balcony: props.property?.has_balcony  || false,
    has_terrace: props.property?.has_terrace  || false,
    has_veranda: props.property?.has_veranda  || false,
    has_pool: props.property?.has_pool  || false,
    has_sauna: props.property?.has_sauna  || false,
    has_fireplace: props.property?.has_fireplace  || false,
    has_fence: props.property?.has_fence  || false,
    has_garden: props.property?.has_garden  || false,
    has_vegetable_garden: props.property?.has_vegetable_garden  || false,
    has_lawn: props.property?.has_lawn  || false,
    has_playground: props.property?.has_playground  || false,
    has_parking: props.property?.has_parking  || false,
  },
  ucastki: {
    land_area: props.property?.land_area || '',
    land_category: props.property?.land_category || '',
    permitted_use: props.property?.permitted_use || '',
    relief: props.property?.relief || '',
    soil_type: props.property?.soil_type || '',
    has_utilities: props.property?.has_utilities || false,
    has_road_access: props.property?.has_road_access || false,
    has_fence: props.property?.has_fence || false,
  },
  'kommerceskaia-nedvizimost': {
    commercial_type_id: props.property?.land_area || '',
    purpose_id: props.property?.purpose_id || '',
    parking_spaces: props.property?.parking_spaces || '',
    layout_type_id: props.property?.layout_type_id || '',
    has_ventilation: props.property?.has_ventilation || false,
    has_air_conditioning: props.property?.has_air_conditioning || false,
    has_security: props.property?.has_security || false,
    has_parking: props.property?.has_parking || false,
  },
  garazi: {
    garage_type_id: props.property?.garage_type_id || '',
    ownership_type_id: props.property?.ownership_type_id || '',
    equipment: props.property?.equipment || '',
    gate_height: props.property?.gate_height || '',
    gate_width: props.property?.gate_width || '',
    vehicle_capacity: props.property?.vehicle_capacity || '',
    has_electricity: props.property?.has_electricity || false,
    has_heating: props.property?.has_heating || false,
    has_water_supply: props.property?.has_water_supply || false,
  }

};

const subFormComponent = computed(() => {
  if (['kvartiry', 'novostroiki', 'komnaty'].includes(propertyTypeActive.value?.slug)) {
    return SubFormNovostroiki;
  }
  else if(propertyTypeActive.value?.slug === 'doma'){
    return SubFormDoma;
  }
  else if(propertyTypeActive.value?.slug === 'ucastki'){
    return SubFormUcastki;
  }
  else if(propertyTypeActive.value?.slug === 'kommerceskaia-nedvizimost'){
    return SubFormKommerceskaiaNedvizimost;
  }
  else if(propertyTypeActive.value?.slug === 'garazi'){
    return SubFormGarazi;
  }
});

const form = useForm({
  title: props.property?.title || '',
  description: props.property?.description || '',
  price: props.property?.price || '',
  category_id : props.property?.category_id || '',
  property_type_id : props.property?.property_type_id || '',
  is_published: props.property?.is_published  || '',
  area_total: props.property?.area_total  || '',
  area_living: props.property?.area_living  || '',
  floor: props.property?.floor  || '',
  floors_total: props.property?.floors_total  || '',
  rooms_total: props.property?.rooms_total  || '',
  bathrooms_total: props.property?.bathrooms_total  || '',
  year_built: props.property?.year_built  || '',
  condition_id: props.property?.condition_id  || '',
  repair_type_id: props.property?.repair_type_id  || '',
  region: props.property?.region  || '',
  city: props.property?.city  || '',
  district: props.property?.district  || '',
  street: props.property?.street  || '',
  house_number: props.property?.house_number  || '',
  apartment_number: props.property?.apartment_number  || '',
  latitude: props.property?.latitude  || '',
  longitude: props.property?.longitude  || '',
  additional: null,
});
const rules = reactive({});

const subFormProps = computed(() => {
  if (!propertyTypeActive.value) return {};

  const baseProps = {
    modelValue: form.additional,
    'onUpdate:modelValue': (value) => form.additional = value
  };

  switch (propertyTypeActive.value.slug) {
    case 'novostroiki':
      return {
        ...baseProps,
        buildingClasses: props.buildingClasses,
        buildingTypes: props.buildingTypes,
        finishingTypes: props.finishingTypes,
      };
    case 'kvartiry':
      return {
        ...baseProps,
        buildingClasses: props.buildingClasses,
        buildingTypes: props.buildingTypes,
        finishingTypes: props.finishingTypes,
      };
    case 'komnaty':
      return {
        ...baseProps,
        buildingClasses: props.buildingClasses,
        buildingTypes: props.buildingTypes,
        finishingTypes: props.finishingTypes,
      };
    case 'doma':
      return {
        ...baseProps,
      };
    case 'kommerceskaia-nedvizimost':
      return {
        ...baseProps,
        commercialTypes: props.commercialTypes,
        purposes: props.purposes,
        layoutTypes: props.layoutTypes,
      };
    case 'garazi':
      return {
        ...baseProps,
        garageTypes: props.garageTypes,
        ownershipTypes: props.ownershipTypes,
      };
    default:
      return baseProps;
  }
});

const submit = async () => {

  const isFormValid = await refForm.value.validate((valid) => valid);

  if(!isFormValid){
    return true;
  }

  emits('submit', form);
}

watch(
  () => form.property_type_id,
  () => {
    propertyTypeActive.value = props.propertyTypes.find(item => item.id === form.property_type_id);
    form.additional = additionalFieldsConfig?.[propertyTypeActive.value?.slug] || null;
  }
);

onMounted(() => {
  nextTick(() => {
    refInputName.value.focus();
  });
});
</script>

<template>
<el-form
  ref="refForm"
  :model="form"
  :rules="rules"
  @submit.prevent="submit"
>
  <div class="flex flex-col">
    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Название" label-position="top" prop="name" required :error="errors?.title || null">
          <el-input ref="refInputName" v-model="form.name" placeholder="Название"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Цена" label-position="top" prop="price" required :error="errors?.price || null">
          <el-input v-model="form.price" placeholder="Цена"/>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Категория" label-position="top" prop="category_id" required :error="errors?.category_id || null">
          <el-select v-model="form.category_id" placeholder="Категория">
            <el-option
              v-for="category in categories"
              :key="category.id"
              :label="category.name"
              :value="category.id"
            />
          </el-select>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Вид недвижимости" label-position="top" prop="property_type_id" required :error="errors?.property_type_id || null">
          <el-select v-model="form.property_type_id" placeholder="Вид недвижимости" filterable>
            <el-option
              v-for="propertyType in propertyTypes"
              :key="propertyType.id"
              :label="propertyType.name"
              :value="propertyType.id"
            />
          </el-select>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Общая площадь в м²" label-position="top" prop="area_total" :error="errors?.area_total || null">
          <el-input v-model="form.area_total" placeholder="Общая площадь в м²"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Жилая площадь в м²" label-position="top" prop="area_living" :error="errors?.area_living || null">
          <el-input v-model="form.area_living" placeholder="Жилая площадь в м²"/>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Этаж" label-position="top" prop="floor" :error="errors?.floor || null">
          <el-input v-model="form.floor" placeholder="Этаж"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Всего этажей в здании" label-position="top" prop="floors_total" :error="errors?.floors_total || null">
          <el-input v-model="form.floors_total" placeholder="Всего этажей в здании"/>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Количество комнат" label-position="top" prop="rooms_total" :error="errors?.rooms_total || null">
          <el-input v-model="form.rooms_total" placeholder="Количество комнат"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Количество санузлов" label-position="top" prop="bathrooms_total" :error="errors?.bathrooms_total || null">
          <el-input v-model="form.bathrooms_total" placeholder="Количество санузлов"/>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Состояние" label-position="top" prop="condition_id" :error="errors?.condition_id || null">
          <el-select v-model="form.condition_id" placeholder="Состояние">
            <el-option
              v-for="condition in conditions"
              :key="condition.id"
              :label="condition.name"
              :value="condition.id"
            />
          </el-select>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Типа ремонта" label-position="top" prop="repair_type_id" :error="errors?.repair_type_id || null">
          <el-select v-model="form.repair_type_id" placeholder="Типа ремонта">
            <el-option
              v-for="repairType in repairTypes"
              :key="repairType.id"
              :label="repairType.name"
              :value="repairType.id"
            />
          </el-select>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col items-end gap-4">
      <div class="flex-1">
        <el-form-item label="Высота потолков" label-position="top" prop="ceiling_height" :error="errors?.ceiling_height || null">
          <el-input v-model="form.ceiling_height" placeholder="Высота потолков"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Год постройки" label-position="top" prop="completion_date" :error="errors?.year_built || null">
          <el-date-picker
            v-model="form.year_built"
            type="date"
            placeholder="Год постройки"
          />
        </el-form-item>
      </div>
    </div>

    <div>
      <el-form-item label="Описание" label-position="top" prop="description" :error="errors?.description || null">
        <el-input
          v-model="form.description"
          placeholder="Описание"
          type="textarea"
        />
      </el-form-item>
    </div>

    <div class="max-w-full">
<!--      <component-->
<!--        :is="subFormComponent"-->
<!--        v-model="form.additional"-->
<!--        v-if="subFormComponent"-->
<!--      />-->
      <component
        :is="subFormComponent"
        v-bind="subFormProps"
        v-if="subFormComponent"
      />
    </div>

    <div>
      <ya-map/>
    </div>

    <div class="flex flex-row py-3">
      <div class="flex-1">
        <el-button type="success" plain native-type="submit">Сохранить</el-button>
      </div>
      <div class="flex-1 flex justify-end">
        <el-switch v-model="form.is_published" active-text="Опубликовано"/>
      </div>
    </div>
  </div>
</el-form>
</template>

<style scoped>

</style>
