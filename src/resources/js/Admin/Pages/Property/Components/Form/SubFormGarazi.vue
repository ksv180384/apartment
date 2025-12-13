<script setup>
const model = defineModel();
defineProps({
  garageTypes: { type: Array, default: [] },
  ownershipTypes: { type: Array, default: [] },
  errors: { type: Object, default: {} },
})
</script>

<template>
<div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Тип" label-position="top" prop="garage_type_id" required :error="errors?.garage_type_id || null">
        <el-select v-model="model.garage_type_id" placeholder="Тип">
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
        <el-select v-model="model.ownership_type_id" placeholder="Форма собственности">
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
          v-model="model.equipment"
          placeholder="Оборудование"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Высота ворот" label-position="top" prop="gate_height" :error="errors?.gate_height || null">
        <el-input
          v-model="model.gate_height"
          placeholder="Высота ворот"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Ширина ворот" label-position="top" prop="gate_width" :error="errors?.gate_width || null">
        <el-input
          v-model="model.gate_width"
          placeholder="Ширина ворот"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Вместимость (количество машин)" label-position="top" prop="vehicle_capacity" :error="errors?.vehicle_capacity || null">
        <el-input
          v-model="model.vehicle_capacity"
          placeholder="Вместимость (количество машин)"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="flex-1">
      <el-form-item prop="has_electricity">
        <el-switch v-model="model.has_electricity" size="small" active-text="Электричество"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_heating">
        <el-switch v-model="model.has_heating" size="small" active-text="Отопление"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_water_supply">
        <el-switch v-model="model.has_water_supply" size="small" active-text="Водоснабжение"/>
      </el-form-item>
    </div>
  </div>


</div>
</template>

<style scoped>

</style>
