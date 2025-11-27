<script setup>
const model = defineModel();
defineProps({
  commercialTypes: { type: Array, default: [] },
  purposes: { type: Array, default: [] },
  layoutTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
})
</script>

<template>
<div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Тип" label-position="top" prop="commercial_type_id" required :error="errors?.commercial_type_id || null">
        <el-select v-model="model.commercial_type_id" placeholder="Тип">
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
        <el-select v-model="model.purpose_id" placeholder="Назначение">
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
        <el-select v-model="model.layout_type_id" placeholder="Планировка">
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

  <div class="flex flex-col">

    <div class="flex-1">
      <el-form-item prop="has_ventilation">
        <el-switch v-model="model.has_ventilation" size="small" active-text="Вентиляция"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_air_conditioning">
        <el-switch v-model="model.has_air_conditioning" size="small" active-text="Кондиционирование"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_security">
        <el-switch v-model="model.has_security" size="small" active-text="Охрана"/>
      </el-form-item>
    </div>

    <div class="flex-1">
      <el-form-item prop="has_parking">
        <el-switch v-model="model.has_parking" size="small" active-text="Парковка"/>
      </el-form-item>
    </div>
    <div class="flex-1" v-if="model.has_parking">
      <el-form-item label="Количество парковочных мест" label-position="top" prop="parking_spaces" :error="errors?.parking_spaces || null">
        <el-input
          v-model="model.parking_spaces"
          placeholder="Количество парковочных мест"
        />
      </el-form-item>
    </div>
  </div>


</div>
</template>

<style scoped>

</style>
