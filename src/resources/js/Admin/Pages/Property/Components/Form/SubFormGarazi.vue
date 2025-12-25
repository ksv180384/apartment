<script setup>
import { onMounted, reactive, ref } from 'vue';

const props = defineProps({
  formData: { type: Object, required: true },
  garageTypes: { type: Array, default: [] },
  ownershipTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
});

const emits = defineEmits(['update']);

const refGaraziForm = ref();
const garaziForm = reactive({
  garage_type_id: '',
  ownership_type_id: '',
  equipment: '',
  gate_height: '',
  gate_width: '',
  vehicle_capacity: '',
  has_electricity: false,
  has_heating: false,
  has_water_supply: false,
});

const rules = {};

// Обновление родительского компонента
const updateParent = () => {
  emits('update', { ...garaziForm });
}

const checkForm = async () => {
  return await refGaraziForm.value.validate((valid) => valid);
}

defineExpose({
  checkForm
});

// Инициализация данных из родителя при редактировании
onMounted(() => {
  if (props.formData.sub_data) {
    Object.assign(garaziForm, props.formData.sub_data)
    updateParent();
  }
});
</script>

<template>
  <el-form
    ref="refGaraziForm"
    :model="garaziForm"
    :rules="rules"
  >
    <div>
      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Тип" label-position="top" prop="garage_type_id" required :error="errors?.garage_type_id || null">
            <el-select
              v-model="garaziForm.garage_type_id"
              placeholder="Тип"
              @change="updateParent"
            >
              <el-option
                v-for="garageType in garageTypes"
                :key="garageType.id"
                :label="garageType.name"
                :value="garageType.id"
              />
            </el-select>
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Форма собственности" label-position="top" prop="ownership_type_id" required :error="errors?.ownership_type_id || null">
            <el-select
              v-model="garaziForm.ownership_type_id"
              placeholder="Форма собственности"
              @change="updateParent"
            >
              <el-option
                v-for="ownershipType in ownershipTypes"
                :key="ownershipType.id"
                :label="ownershipType.name"
                :value="ownershipType.id"
              />
            </el-select>
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Оборудование" label-position="top" prop="equipment" :error="errors?.equipment || null">
            <el-input
              v-model="garaziForm.equipment"
              placeholder="Оборудование"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Высота ворот (мм)" label-position="top" prop="gate_height" :error="errors?.gate_height || null">
            <el-input
              v-model="garaziForm.gate_height"
              placeholder="Высота ворот (мм)"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Ширина ворот (мм)" label-position="top" prop="gate_width" :error="errors?.gate_width || null">
            <el-input
              v-model="garaziForm.gate_width"
              placeholder="Ширина ворот (мм)"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Вместимость (количество машин)" label-position="top" prop="vehicle_capacity" :error="errors?.vehicle_capacity || null">
            <el-input
              v-model="garaziForm.vehicle_capacity"
              placeholder="Вместимость (количество машин)"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex flex-col lg:flex-row">
        <div class="flex-1">
          <el-form-item prop="has_electricity">
            <el-switch
              v-model="garaziForm.has_electricity"
              size="small"
              active-text="Электричество"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_heating">
            <el-switch
              v-model="garaziForm.has_heating"
              size="small"
              active-text="Отопление"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_water_supply">
            <el-switch
              v-model="garaziForm.has_water_supply"
              size="small"
              active-text="Водоснабжение"
              @change="updateParent"
            />
          </el-form-item>
        </div>
      </div>


    </div>
  </el-form>
</template>

<style scoped>

</style>
