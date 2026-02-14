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
  floor: '',
  area_living: '',
  area_kitchen: '',
  rooms_total: '',
  bathrooms_total: '',
  ceiling_height: '',
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
  // building_class_id: [
  //   { required: true, message: 'Поле обязательно для заполнения', trigger: 'blur' }
  // ],
  // building_type_id: [
  //   { required: true, message: 'Поле обязательно для заполнения', trigger: 'blur' }
  // ],
  // finishing_type_id: [
  //   { required: true, message: 'Поле обязательно для заполнения', trigger: 'blur' }
  // ],
};
const NULLABLE_ID_KEYS = ['building_class_id', 'building_type_id', 'finishing_type_id'];

// Обновление родительского компонента (пустые строки от clearable → null для сохранения в БД)
const updateParent = () => {
  const payload = { ...novostroikiForm };
  NULLABLE_ID_KEYS.forEach((key) => {
    if (payload[key] === '' || payload[key] == null) payload[key] = null;
  });
  emits('update', payload);
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

        <div class="flex-1">
          <el-form-item label="Этажность дома" label-position="top" prop="building_floors" :error="errors?.building_floors || null">
            <el-input
              v-model="novostroikiForm.building_floors"
              placeholder="Этажность дома"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Этаж" label-position="top" prop="floor" :error="errors?.floor || null">
            <el-input
              v-model="novostroikiForm.floor"
              placeholder="Этаж"
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

        <div class="flex-1">
          <el-form-item label="Жилая площадь в м²" label-position="top" prop="area_living" :error="errors?.area_living || null">
            <el-input
              v-model="novostroikiForm.area_living"
              placeholder="Жилая площадь в м²"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Площадь кухни в м²" label-position="top" prop="area_kitchen" :error="errors?.area_kitchen || null">
            <el-input
              v-model="novostroikiForm.area_kitchen"
              placeholder="Площадь площадь в м²"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Количество комнат" label-position="top" prop="rooms_total" :error="errors?.rooms_total || null">
            <el-input
              v-model="novostroikiForm.rooms_total"
              placeholder="Количество комнат"
              @input="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item label="Количество санузлов" label-position="top" prop="bathrooms_total" :error="errors?.bathrooms_total || null">
            <el-input
              v-model="novostroikiForm.bathrooms_total"
              placeholder="Количество санузлов"
              @input="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col gap-4">
        <div class="flex-1">
          <el-form-item label="Класс жилья" label-position="top" prop="building_class_id" :error="errors?.building_class_id || null">
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
          <el-form-item label="Тип дома" label-position="top" prop="building_type_id" :error="errors?.building_type_id || null">
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
          <el-form-item label="Тип отделки" label-position="top" prop="finishing_type_id" :error="errors?.finishing_type_id || null">
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
      <div class="flex md:flex-row flex-col gap-4">

        <div class="flex-1">
          <el-form-item label="Высота потолков (мм)" label-position="top" prop="ceiling_height" :error="errors?.ceiling_height || null">
            <el-input
              v-model="novostroikiForm.ceiling_height"
              placeholder="Высота потолков (мм)"
              @change="updateParent"
            />
          </el-form-item>
        </div>

        <div class="flex-1">
          <el-form-item label="Дата сдачи дома" label-position="top" prop="completion_date" :error="errors?.completion_date || null">
            <el-date-picker
              v-model="novostroikiForm.completion_date"
              type="date"
              placeholder="Дата сдачи дома"
              format="DD.MM.YYYY"
              value-format="YYYY-MM-DD"
              @change="updateParent"
            />
          </el-form-item>
        </div>

      </div>

      <div class="flex md:flex-row flex-col items-end gap-4">
        <div class="flex-1">
          <el-form-item prop="has_balcony">
            <el-switch
              v-model="novostroikiForm.has_balcony"
              active-text="балкон"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_installment">
            <el-switch
              v-model="novostroikiForm.has_installment"
              active-text="Рассрочка от застройщика"
              @change="updateParent"
            />
          </el-form-item>
        </div>
      </div>

      <div class="flex md:flex-row flex-col items-end gap-4">
        <div class="flex-1">
          <el-form-item prop="has_loggia">
            <el-switch
              v-model="novostroikiForm.has_loggia"
              active-text="лоджия"
              @change="updateParent"
            />
          </el-form-item>
        </div>
        <div class="flex-1">
          <el-form-item prop="has_mortgage">
            <el-switch
              v-model="novostroikiForm.has_mortgage"
              active-text="Ипотека от застройщика"
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
