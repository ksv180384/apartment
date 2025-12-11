<script setup>
import { ref, reactive, onMounted } from 'vue';

const props = defineProps({
  formData: { type: Object, required: true },
  buildingClasses: { type: Array, default: [] },
  buildingTypes: { type: Array, default: [] },
  finishingTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
});
const emits = defineEmits(['update']);

const refNovostroikiForm = ref();
const novostroikiForm = reactive({
  building_name: '',
  developer: '',
  building_floors: '',
  apartments_total: '',
  building_class_id: '',
  building_type_id: '',
  finishing_type_id: '',
  completion_date: '',
  has_installment: false,
  has_balcony: false,
  has_mortgage: false,
  has_loggia: false,
});

const rules = {
  building_class_id: [
    { required: true, message: 'Введите Telegram', trigger: 'blur' }
  ],
  building_type_id: [
    { required: true, message: 'Введите Telegram', trigger: 'blur' }
  ],
  finishing_type_id: [
    { required: true, message: 'Введите Telegram', trigger: 'blur' }
  ],
}
// Обновление родительского компонента
const updateParent = () => {
  emits('update', { ...novostroikiForm });
}

const checkForm = async () => {
  return await refNovostroikiForm.value.validate((valid) => valid);
}

defineExpose({
  checkForm
});

// Инициализация данных из родителя при редактировании
onMounted(() => {
  if (props.formData.sub_data) {
    Object.assign(novostroikiForm, props.formData.sub_data)
    updateParent();
  }
});
</script>

<template>
  <el-form
    ref="refNovostroikiForm"
    :model="novostroikiForm"
    :rules="rules"
  >
    <div>
      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Название ЖК" label-position="top" prop="building_name" :error="errors?.building_name || null">
            <el-input
              v-model="novostroikiForm.building_name"
              placeholder="Название ЖК"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Застройщик" label-position="top" prop="developer" :error="errors?.developer || null">
            <el-input
              v-model="novostroikiForm.developer"
              placeholder="Застройщик"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Этажность дома" label-position="top" prop="building_floors" :error="errors?.building_floors || null">
            <el-input
              v-model="novostroikiForm.building_floors"
              placeholder="Этажность дома"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Количество квартир в доме" label-position="top" prop="apartments_total" :error="errors?.apartments_total || null">
            <el-input
              v-model="novostroikiForm.apartments_total"
              placeholder="Количество квартир в доме"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>
      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Класс жилья" label-position="top" prop="building_class_id" required :error="errors?.building_class_id || null">
            <el-select
              v-model="novostroikiForm.building_class_id"
              placeholder="Класс жилья"
              @change="updateParent"
            >
              <el-option
                v-for="buildingClass in buildingClasses"
                :key="buildingClass.id"
                :label="buildingClass.name"
                :value="buildingClass.id"
              />
            </el-select>
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Тип дома" label-position="top" prop="building_type_id" required :error="errors?.building_type_id || null">
            <el-select
              v-model="novostroikiForm.building_type_id"
              placeholder="Тип дома"
              @change="updateParent"
            >
              <el-option
                v-for="buildingType in buildingTypes"
                :key="buildingType.id"
                :label="buildingType.name"
                :value="buildingType.id"
              />
            </el-select>
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Тип отделки" label-position="top" prop="finishing_type_id" required :error="errors?.finishing_type_id || null">
            <el-select
              v-model="novostroikiForm.finishing_type_id"
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
      <div class="flex md:flex-row flex-col items-end gap-4">
        <div class="flex-1">
          <el-form-item label="Дата сдачи дома" label-position="top" prop="completion_date" :error="errors?.completion_date || null">
            <el-date-picker
              v-model="novostroikiForm.completion_date"
              type="date"
              placeholder="Дата сдачи дома"
              @change="updateParent"
            />
          </el-form-item>
        </div>

      </div>

      <div class="flex md:flex-row flex-col items-end gap-4">
        <div class="flex-1">
          <el-form-item prop="has_installment">
            <el-switch
              v-model="novostroikiForm.has_installment"
              active-text="Рассрочка от застройщика"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_balcony">
            <el-switch
              v-model="novostroikiForm.has_balcony"
              active-text="балкон"
              @change="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col items-end gap-4">
        <div class="flex-1">
          <el-form-item prop="has_mortgage">
            <el-switch
              v-model="novostroikiForm.has_mortgage"
              active-text="Ипотека от застройщика"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_loggia">
            <el-switch
              v-model="novostroikiForm.has_loggia"
              active-text="лоджия"
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
