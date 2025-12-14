<script setup>
import { onMounted, reactive, ref } from 'vue';

const props = defineProps({
  formData: { type: Object, required: true },
  commercialTypes: { type: Array, default: [] },
  purposes: { type: Array, default: [] },
  layoutTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
});

const emits = defineEmits(['update']);

const refKommerceskaiaNedvizimostForm = ref();
const kommerceskaiaNedvizimostForm = reactive({
  commercial_type_id: '',
  purpose_id: '',
  layout_type_id: '',
  has_ventilation: false,
  has_air_conditioning: false,
  has_security: false,
  has_parking: false,
  parking_spaces: '',
});

const rules = {};

// Обновление родительского компонента
const updateParent = () => {
  emits('update', { ...kommerceskaiaNedvizimostForm });
}

const checkForm = async () => {
  return await refKommerceskaiaNedvizimostForm.value.validate((valid) => valid);
}

defineExpose({
  checkForm
});

// Инициализация данных из родителя при редактировании
onMounted(() => {
  if (props.formData.sub_data) {
    Object.assign(kommerceskaiaNedvizimostForm, props.formData.sub_data)
    updateParent();
  }
});
</script>

<template>
<div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Тип" label-position="top" prop="commercial_type_id" required :error="errors?.commercial_type_id || null">
        <el-select v-model="kommerceskaiaNedvizimostForm.commercial_type_id" placeholder="Тип">
          <el-option
            v-for="commercialType in commercialTypes"
            :key="commercialType.id"
            :label="commercialType.name"
            :value="commercialType.id"
          />
        </el-select>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Назначение" label-position="top" prop="purpose_id" required :error="errors?.purpose_id || null">
        <el-select v-model="kommerceskaiaNedvizimostForm.purpose_id" placeholder="Назначение">
          <el-option
            v-for="purpose in purposes"
            :key="purpose.id"
            :label="purpose.name"
            :value="purpose.id"
          />
        </el-select>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Планировка" label-position="top" prop="layout_type_id" required :error="errors?.layout_type_id || null">
        <el-select v-model="kommerceskaiaNedvizimostForm.layout_type_id" placeholder="Планировка">
          <el-option
            v-for="layoutType in layoutTypes"
            :key="layoutType.id"
            :label="layoutType.name"
            :value="layoutType.id"
          />
        </el-select>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex flex-col flex-1">
      <div class="flex-1">
        <el-form-item prop="has_ventilation">
          <el-switch v-model="kommerceskaiaNedvizimostForm.has_ventilation" size="small" active-text="Вентиляция"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item prop="has_air_conditioning">
          <el-switch v-model="kommerceskaiaNedvizimostForm.has_air_conditioning" size="small" active-text="Кондиционирование"/>
        </el-form-item>
      </div>
    </div>

    <div class="flex flex-col flex-1">
      <div class="flex-1">
        <el-form-item prop="has_security">
          <el-switch v-model="kommerceskaiaNedvizimostForm.has_security" size="small" active-text="Охрана"/>
        </el-form-item>
      </div>

      <div class="flex-1">
        <el-form-item prop="has_parking">
          <el-switch v-model="kommerceskaiaNedvizimostForm.has_parking" size="small" active-text="Парковка"/>
        </el-form-item>
      </div>
    </div>
  </div>

  <div class="flex flex-row flex-1">
    <div class="flex-1"></div>

    <div class="flex-1">
      <div v-if="kommerceskaiaNedvizimostForm.has_parking">
        <el-form-item label="Количество парковочных мест" label-position="top" prop="parking_spaces" :error="errors?.parking_spaces || null">
          <el-input
            v-model="kommerceskaiaNedvizimostForm.parking_spaces"
            placeholder="Количество парковочных мест"
          />
        </el-form-item>
      </div>
    </div>
  </div>


</div>
</template>

<style scoped>

</style>
