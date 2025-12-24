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
  <el-form
    ref="refUcastkiForm"
    :model="ucastkiForm"
    :rules="rules"
  >
    <div>
      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Площадь участка в сотках" label-position="top" prop="land_area" :error="errors?.land_area || null">
            <el-input
              v-model="ucastkiForm.land_area"
              placeholder="Площадь участка в сотках"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Категория земли" label-position="top" prop="land_category" :error="errors?.land_category || null">
            <el-input
              v-model="ucastkiForm.land_category"
              placeholder="Категория земли"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Разрешенное использование" label-position="top" prop="permitted_use" :error="errors?.permitted_use || null">
            <el-input
              v-model="ucastkiForm.permitted_use"
              placeholder="Разрешенное использование"
              @input="updateParent"
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
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Тип почвы" label-position="top" prop="soil_type" :error="errors?.soil_type || null">
            <el-input
              v-model="ucastkiForm.soil_type"
              placeholder="Тип почвы"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item prop="has_utilities">
            <el-switch
              v-model="ucastkiForm.has_utilities"
              size="small"
              active-text="Коммуникации"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_road_access">
            <el-switch
              v-model="ucastkiForm.has_road_access"
              size="small"
              active-text="Подъездные пути"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_fence">
            <el-switch
              v-model="ucastkiForm.has_fence"
              size="small"
              active-text="Ограждение"
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
