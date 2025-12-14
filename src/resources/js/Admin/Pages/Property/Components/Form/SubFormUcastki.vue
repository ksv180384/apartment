<script setup>
import { onMounted, reactive, ref } from 'vue';

const props = defineProps({
  formData: { type: Object, required: true },
  errors: { type: Object, default: {} },
});

const emits = defineEmits(['update']);

const refUcastkiForm = ref();
const ucastkiForm = reactive({
  land_area: '',
  land_category: '',
  permitted_use: '',
  relief: '',
  soil_type: '',
  has_utilities: false,
  has_road_access: false,
  has_fence: false,
});

const rules = {};

// Обновление родительского компонента
const updateParent = () => {
  emits('update', { ...ucastkiForm });
}

const checkForm = async () => {
  return await refUcastkiForm.value.validate((valid) => valid);
}

defineExpose({
  checkForm
});

// Инициализация данных из родителя при редактировании
onMounted(() => {
  if (props.formData.sub_data) {
    Object.assign(ucastkiForm, props.formData.sub_data)
    updateParent();
  }
});
</script>

<template>
<div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Площадь участка в сотках" label-position="top" prop="land_area" :error="errors?.land_area || null">
        <el-input
          v-model="ucastkiForm.land_area"
          placeholder="Площадь участка в сотках"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Категория земли" label-position="top" prop="land_category" :error="errors?.land_category || null">
        <el-input
          v-model="ucastkiForm.land_category"
          placeholder="Категория земли"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Разрешенное использование" label-position="top" prop="permitted_use" :error="errors?.permitted_use || null">
        <el-input
          v-model="ucastkiForm.permitted_use"
          placeholder="Разрешенное использование"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Рельеф" label-position="top" prop="relief" :error="errors?.relief || null">
        <el-input
          v-model="ucastkiForm.relief"
          placeholder="Рельеф"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Тип почвы" label-position="top" prop="soil_type" :error="errors?.soil_type || null">
        <el-input
          v-model="ucastkiForm.soil_type"
          placeholder="Тип почвы"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_utilities">
        <el-switch v-model="ucastkiForm.has_utilities" size="small" active-text="Коммуникации"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_road_access">
        <el-switch v-model="ucastkiForm.has_road_access" size="small" active-text="Подъездные пути"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_fence">
        <el-switch v-model="ucastkiForm.has_fence" size="small" active-text="Ограждение"/>
      </el-form-item>
    </div>
  </div>
</div>
</template>

<style scoped>

</style>
