<script setup>
import { onMounted, reactive, ref } from 'vue';

const props = defineProps({
  formData: { type: Object, required: true },
  finishingTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
});

const emits = defineEmits(['update']);

const refDomaForm = ref();
const domaForm = reactive({
  land_area: '',
  bedrooms_total: '',
  wall_material: '',
  roof_material: '',
  foundation_type: '',
  building_floors: '',
  finishing_type_id: '',
  area_living: '',
  bathrooms_total: '',
  ceiling_height: '',
  has_electricity: false,
  has_water_supply: false,
  has_sewage: false,
  has_heating: false,
  has_gas: false,
  has_lawn: false,
  has_internet: false,
  has_phone_line: false,
  has_garage: false,
  has_parking: false,
  has_basement: false,
  has_attic: false,
  has_balcony: false,
  has_terrace: false,
  has_veranda: false,
  has_pool: false,
  has_sauna: false,
  has_fireplace: false,
  has_fence: false,
  has_garden: false,
  has_vegetable_garden: false,
  has_playground: false,
});

const rules = {};

// Обновление родительского компонента
const updateParent = () => {
  emits('update', { ...domaForm });
}

const checkForm = async () => {
  return await refDomaForm.value.validate((valid) => valid);
}

defineExpose({
  checkForm
});

// Инициализация данных из родителя при редактировании
onMounted(() => {
  if (props.formData.sub_data) {
    Object.assign(domaForm, props.formData.sub_data)
    updateParent();
  }
});
</script>

<template>
<div>
  <el-form
    ref="refDomaForm"
    :model="domaForm"
    :rules="rules"
  >
    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Площадь участка в сотках" label-position="top" prop="land_area" :error="errors?.land_area || null">
          <el-input
            v-model="domaForm.land_area"
            placeholder="Площадь участка в сотках"
            @input="updateParent"
          />
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Этажность дома" label-position="top" prop="building_floors" :error="errors?.building_floors || null">
          <el-input
            v-model="domaForm.building_floors"
            placeholder="Этажность дома"
            @input="updateParent"
          />
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Материал стен" label-position="top" prop="wall_material" :error="errors?.wall_material || null">
          <el-input
            v-model="domaForm.wall_material"
            placeholder="Материал стен"
            @input="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Тип фундамента" label-position="top" prop="foundation_type" :error="errors?.foundation_type || null">
          <el-input
            v-model="domaForm.foundation_type"
            placeholder="Тип фундамента"
            @input="updateParent"
          />
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Материал крыши" label-position="top" prop="roof_material" :error="errors?.roof_material || null">
          <el-input
            v-model="domaForm.roof_material"
            placeholder="Материал крыши"
            @input="updateParent"
          />
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Тип отделки" label-position="top" prop="finishing_type_id" required :error="errors?.finishing_type_id || null">
          <el-select
            v-model="domaForm.finishing_type_id"
            placeholder="Тип отделки"
            @change="updateParent"
          >
            <el-option
              v-for="finishingType in finishingTypes"
              :key="finishingType.id"
              :label="finishingType.name"
              :value="finishingType.id"
            />
          </el-select>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Жилая площадь в м²" label-position="top" prop="area_living" :error="errors?.area_living || null">
          <el-input
            v-model="domaForm.area_living"
            placeholder="Жилая площадь в м²"
            @input="updateParent"
          />
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Количество спален" label-position="top" prop="bedrooms_total" :error="errors?.bedrooms_total || null">
          <el-input
            v-model="domaForm.bedrooms_total"
            placeholder="Количество спален"
            @input="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Количество санузлов" label-position="top" prop="bathrooms_total" :error="errors?.bathrooms_total || null">
          <el-input
            v-model="domaForm.bathrooms_total"
            placeholder="Количество санузлов"
            @input="updateParent"
          />
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item label="Высота потолков (мм)" label-position="top" prop="ceiling_height" :error="errors?.ceiling_height || null">
          <el-input
            v-model="domaForm.ceiling_height"
            placeholder="Высота потолков (мм)"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_electricity">
          <el-switch
            v-model="domaForm.has_electricity"
            size="small"
            active-text="Электричество"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_water_supply">
          <el-switch
            v-model="domaForm.has_water_supply"
            size="small"
            active-text="Водоснабжение"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_sewage">
          <el-switch
            v-model="domaForm.has_sewage"
            size="small"
            active-text="Канализация"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_heating">
          <el-switch
            v-model="domaForm.has_heating"
            size="small"
            active-text="Отопление"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_gas">
          <el-switch
            v-model="domaForm.has_gas"
            size="small"
            active-text="Газ"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_parking">
          <el-switch
            v-model="domaForm.has_parking"
            size="small"
            active-text="Парковка"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_internet">
          <el-switch
            v-model="domaForm.has_internet"
            size="small"
            active-text="Интернет"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_phone_line">
          <el-switch
            v-model="domaForm.has_phone_line"
            size="small"
            active-text="Телефонная линия"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_garage">
          <el-switch
            v-model="domaForm.has_garage"
            size="small"
            active-text="Гараж"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_basement">
          <el-switch
            v-model="domaForm.has_basement"
            size="small"
            active-text="Подвал"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_attic">
          <el-switch
            v-model="domaForm.has_attic"
            size="small"
            active-text="Чердак/мансарда"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_balcony">
          <el-switch
            v-model="domaForm.has_balcony"
            size="small"
            active-text="Балкон"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_terrace">
          <el-switch
            v-model="domaForm.has_terrace"
            size="small"
            active-text="Терраса"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_veranda">
          <el-switch
            v-model="domaForm.has_veranda"
            size="small"
            active-text="Веранда"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_pool">
          <el-switch
            v-model="domaForm.has_pool"
            size="small"
            active-text="Бассейн"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_sauna">
          <el-switch
            v-model="domaForm.has_sauna"
            size="small"
            active-text="Сауна/баня"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_fireplace">
          <el-switch
            v-model="domaForm.has_fireplace"
            size="small"
            active-text="Камин"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_fence">
          <el-switch
            v-model="domaForm.has_fence"
            size="small"
            active-text="Ограждение"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_garden">
          <el-switch
            v-model="domaForm.has_garden"
            size="small"
            active-text="Сад"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_vegetable_garden">
          <el-switch
            v-model="domaForm.has_vegetable_garden"
            size="small"
            active-text="Огород"
            @change="updateParent"
          />
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_lawn">
          <el-switch
            v-model="domaForm.has_lawn"
            size="small"
            active-text="Газон"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item prop="has_playground">
          <el-switch
            v-model="domaForm.has_playground"
            size="small"
            active-text="Детская площадка"
            @change="updateParent"
          />
        </el-form-item>
      </div>
    </div>
  </el-form>
</div>
</template>

<style scoped>

</style>
