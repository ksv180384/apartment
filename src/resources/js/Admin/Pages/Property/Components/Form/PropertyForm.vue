<script setup>
import { ref, onMounted, nextTick, reactive, watch, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';

import YaMap from '@/Admin/Pages/Property/Components/Form/YaMap.vue';
import SubFormNovostroiki from '@/Admin/Pages/Property/Components/Form/SubFormNovostroiki.vue';
import SubFormKvartiry from '@/Admin/Pages/Property/Components/Form/SubFormKvartiry.vue';
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
const refSubForm = ref();
const refInputName = ref();

const propertyTypeActive = ref(null);

const subFormComponent = computed(() => {
  if (['novostroiki'].includes(propertyTypeActive.value?.slug)) {
    return SubFormNovostroiki;
  }
  if (['kvartiry', 'komnaty'].includes(propertyTypeActive.value?.slug)) {
    return SubFormKvartiry;
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

const inertiaForm = useForm({
  title: null,
  description: null,
  price: null,
  category_id : null,
  property_type_id : null,
  property_type_slug : null,
  is_published: null,
  area_total: null,
  year_built: null,
  region: null,
  city: null,
  district: null,
  street: null,
  house_number: null,
  apartment_number: null,
  latitude: null,
  longitude: null,
  sub_data: null,
});
const form = reactive({
  title: props.property?.title || '',
  description: props.property?.description || '',
  price: props.property?.price || '',
  category_id : props.property?.category_id || '',
  property_type_id : props.property?.property_type_id || '',
  property_type_slug : null,
  is_published: props.property?.is_published  || true,
  area_total: props.property?.area_total  || '',
  year_built: props.property?.year_built  || '',
  region: props.property?.region  || '',
  city: props.property?.city  || '',
  district: props.property?.district  || '',
  street: props.property?.street  || '',
  house_number: props.property?.house_number  || '',
  apartment_number: props.property?.apartment_number  || '',
  latitude: props.property?.latitude  || '',
  longitude: props.property?.longitude  || '',
});

const rules = {
  title: [
    { required: true, message: 'Введите название', trigger: 'blur' }
  ],
  price: [
    { required: true, message: 'Введите цену', trigger: 'blur' }
  ],
  category_id: [
    { required: true, message: 'Введите категорию', trigger: 'blur' }
  ],
  property_type_id: [
    { required: true, message: 'Введите вид', trigger: 'blur' }
  ],
};

const getSubFormProps = () => {
  if (!propertyTypeActive.value) return {};

  switch (propertyTypeActive.value.slug) {
    case 'novostroiki':
      return {
        buildingClasses: props.buildingClasses,
        buildingTypes: props.buildingTypes,
        finishingTypes: props.finishingTypes,
      };
    case 'kvartiry':
      return {
        buildingClasses: props.buildingClasses,
        buildingTypes: props.buildingTypes,
        finishingTypes: props.finishingTypes,
      };
    case 'komnaty':
      return {
        buildingClasses: props.buildingClasses,
        buildingTypes: props.buildingTypes,
        finishingTypes: props.finishingTypes,
      };
    case 'ucastki':
      return {};
    case 'doma':
      return {
        finishingTypes: props.finishingTypes,
      };
    case 'kommerceskaia-nedvizimost':
      return {
        commercialTypes: props.commercialTypes,
        purposes: props.purposes,
        layoutTypes: props.layoutTypes,
      };
    case 'garazi':
      return {
        garageTypes: props.garageTypes,
        ownershipTypes: props.ownershipTypes,
      };
    default:
      return {};
  }
};

const onSelectAddress = (address) => {
  const [ region, city, street, houseNumber ] = address.split(', ');

  form.region = region;
  form.city = city;
  form.street = street;
  form.house_number = houseNumber;
}

const onSelectPosition = (position) => {
  const [ latitude, longitude ] = position;

  form.latitude = latitude;
  form.longitude = longitude;
}
// Получение данных из субформы
const updateSubForm = (data) => {
  inertiaForm.sub_data = data;
}

const submit = async () => {

  const isFormValid = await refForm.value.validate((valid) => valid);
  const isSubFormValid = await refSubForm.value.checkForm();

  if(!isFormValid || !isSubFormValid){
    return true;
  }

  inertiaForm.title = form.title;
  inertiaForm.description = form.description;
  inertiaForm.price = form.price;
  inertiaForm.category_id = form.category_id;
  inertiaForm.property_type_id = form.property_type_id;
  inertiaForm.property_type_slug = form.property_type_slug;
  inertiaForm.is_published = form.is_published;
  inertiaForm.area_total = form.area_total;
  inertiaForm.year_built = form.year_built;
  inertiaForm.region = form.region;
  inertiaForm.city = form.city;
  inertiaForm.district = form.district;
  inertiaForm.street = form.street;
  inertiaForm.house_number = form.house_number;
  inertiaForm.apartment_number = form.apartment_number;
  inertiaForm.latitude = form.latitude;
  inertiaForm.longitude = form.longitude;

  emits('submit', inertiaForm);
}

watch(
  () => form.property_type_id,
  (newTypeId) => {
    propertyTypeActive.value = props.propertyTypes.find(item => item.id === newTypeId);

    if (propertyTypeActive.value?.slug) {
      form.property_type_slug = propertyTypeActive.value.slug;
    }
  },
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
        <el-form-item label="Название" label-position="top" prop="title" required :error="errors?.title || null">
          <el-input ref="refInputName" v-model="form.title" clearable placeholder="Название"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="Цена" label-position="top" prop="price" required :error="errors?.price || null">
          <el-input v-model="form.price" placeholder="Цена" clearable/>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item
          label="Категория"
          label-position="top"
          prop="category_id"
          required
          :error="errors?.category_id || null"
        >
          <el-select v-model="form.category_id" placeholder="Категория" clearable>
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
        <el-form-item
          label="Вид недвижимости"
          label-position="top"
          prop="property_type_id"
          required
          :error="errors?.property_type_id || null"
        >
          <el-select v-model="form.property_type_id" placeholder="Вид недвижимости" clearable filterable>
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
          <el-input v-model="form.area_total" placeholder="Общая площадь в м²" clearable/>
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Год постройки" label-position="top" prop="completion_date" :error="errors?.year_built || null">
          <el-date-picker
            v-model="form.year_built"
            type="date"
            clearable
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

    <Transition
      enter-active-class="transition-all duration-500 ease-out"
      enter-from-class="transform opacity-0 scale-95 translate-y-4"
      enter-to-class="transform opacity-100 scale-100 translate-y-0"
      leave-active-class="transition-all duration-300 ease-in"
      leave-from-class="transform opacity-100 scale-100 translate-y-0"
      leave-to-class="transform opacity-0 scale-95 -translate-y-4"
    >
      <div
        v-if="propertyTypeActive"
        ref="animatedContainer"
        class="max-w-full rounded-lg bg-gray-50 p-4"
      >
        <component
          :is="subFormComponent"
          ref="refSubForm"
          v-if="subFormComponent"
          v-bind="getSubFormProps()"
          :form-data="form"
          @update="updateSubForm"
        />
      </div>
    </Transition>

    <el-divider content-position="left">Адрес</el-divider>

    <div class="flex flex-col">
      <div class="flex gap-3">
        <el-form-item label="Область" label-position="top" prop="region" class="flex-1" :error="errors?.region || null">
          <el-input v-model="form.region" placeholder="Область"/>
        </el-form-item>

        <el-form-item label="Город" label-position="top" prop="city" class="flex-1" :error="errors?.city || null">
          <el-input v-model="form.city" placeholder="Город"/>
        </el-form-item>

        <el-form-item label="Улица" label-position="top" prop="street" class="flex-1" :error="errors?.street || null">
          <el-input v-model="form.street" placeholder="Улица"/>
        </el-form-item>

        <el-form-item label="Номер дома" label-position="top" prop="house_number" class="flex-1" :error="errors?.house_number || null">
          <el-input v-model="form.house_number" placeholder="Номер дома"/>
        </el-form-item>

        <el-form-item label="Номер квартиры" label-position="top" prop="apartment_number" class="flex-1" :error="errors?.apartment_number || null">
          <el-input v-model="form.apartment_number" placeholder="Номер квартиры"/>
        </el-form-item>
      </div>

      <div class="flex gap-3">
        <el-form-item label="Широта" label-position="top" prop="latitude" class="flex-1" :error="errors?.latitude || null">
          <el-input v-model="form.latitude" placeholder="Широта"/>
        </el-form-item>

        <el-form-item label="Долгота" label-position="top" prop="longitude" class="flex-1" :error="errors?.longitude || null">
          <el-input v-model="form.longitude" placeholder="Долгота"/>
        </el-form-item>
      </div>
    </div>

    <div>
      <ya-map
        @selectAddress="onSelectAddress"
        @selectPosition="onSelectPosition"
      />
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
