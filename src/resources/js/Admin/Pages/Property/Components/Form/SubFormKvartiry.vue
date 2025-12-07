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

  <div class="flex md:flex-row flex-col items-end gap-4">
    <div class="flex-1">
      <el-form-item prop="has_balcony">
        <el-switch v-model="model.has_balcony" active-text="балкон"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="completion_date">
        <el-switch v-model="model.has_loggia" active-text="лоджия"/>
      </el-form-item>
    </div>
  </div>
</div>
</template>

<style scoped>

</style>
