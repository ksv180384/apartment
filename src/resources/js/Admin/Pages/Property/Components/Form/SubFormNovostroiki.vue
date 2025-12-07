<script setup>
const model = defineModel();
defineProps({
  buildingClasses: { type: Array, default: [] },
  buildingTypes: { type: Array, default: [] },
  finishingTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
})
</script>

<template>
<div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Название ЖК" label-position="top" prop="building_name" :error="errors?.building_name || null">
        <el-input
          v-model="model.building_name"
          placeholder="Название ЖК"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Застройщик" label-position="top" prop="developer" :error="errors?.developer || null">
        <el-input
          v-model="model.developer"
          placeholder="Застройщик"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Этажность дома" label-position="top" prop="building_floors" :error="errors?.building_floors || null">
        <el-input
          v-model="model.building_floors"
          placeholder="Этажность дома"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Количество квартир в доме" label-position="top" prop="apartments_total" :error="errors?.apartments_total || null">
        <el-input
          v-model="model.apartments_total"
          placeholder="Количество квартир в доме"
        />
      </el-form-item>
    </div>
  </div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Класс жилья" label-position="top" prop="building_class_id" required :error="errors?.building_class_id || null">
        <el-select v-model="model.building_class_id" placeholder="Класс жилья">
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
        <el-select v-model="model.building_type_id" placeholder="Тип дома">
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
        <el-select v-model="model.finishing_type_id" placeholder="Тип отделки">
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
          v-model="model.completion_date"
          type="date"
          placeholder="Дата сдачи дома"
        />
      </el-form-item>
    </div>

  </div>

  <div class="flex md:flex-row flex-col items-end gap-4">
    <div class="flex-1">
      <el-form-item prop="has_installment">
        <el-switch v-model="model.has_installment" active-text="Рассрочка от застройщика"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_balcony">
        <el-switch v-model="model.has_balcony" active-text="балкон"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col items-end gap-4">
    <div class="flex-1">
      <el-form-item prop="has_mortgage">
        <el-switch v-model="model.has_mortgage" active-text="Ипотека от застройщика"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_loggia">
        <el-switch v-model="model.has_loggia" active-text="лоджия"/>
      </el-form-item>
    </div>
  </div>

</div>
</template>

<style scoped>

</style>
