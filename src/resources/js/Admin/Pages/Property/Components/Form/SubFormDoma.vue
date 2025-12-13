<script setup>
const model = defineModel();
defineProps({
  errors: { type: Object, default: {} },
})
</script>

<template>
<div>
  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Площадь участка в сотках" label-position="top" prop="land_area" :error="errors?.land_area || null">
        <el-input
          v-model="model.land_area"
          placeholder="Площадь участка в сотках"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Количество спален" label-position="top" prop="bedrooms_total" :error="errors?.bedrooms_total || null">
        <el-input
          v-model="model.bedrooms_total"
          placeholder="Количество спален"
        />
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item label="Материал стен" label-position="top" prop="wall_material" :error="errors?.wall_material || null">
        <el-input
          v-model="model.wall_material"
          placeholder="Материал стен"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item label="Материал крыши" label-position="top" prop="roof_material" :error="errors?.roof_material || null">
        <el-input
          v-model="model.roof_material"
          placeholder="Материал крыши"
        />
      </el-form-item>
    </div>

    <div class="flex-1">
      <el-form-item label="Тип фундамента" label-position="top" prop="foundation_type" :error="errors?.foundation_type || null">
        <el-input
          v-model="model.foundation_type"
          placeholder="Тип фундамента"
        />
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_electricity">
        <el-switch v-model="model.has_electricity" size="small" active-text="Электричество"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_water_supply">
        <el-switch v-model="model.has_water_supply" size="small" active-text="Водоснабжение"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_sewage">
        <el-switch v-model="model.has_sewage" size="small" active-text="Канализация"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_heating">
        <el-switch v-model="model.has_heating" size="small" active-text="Отопление"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_gas">
        <el-switch v-model="model.has_gas" size="small" active-text="Газ"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_parking">
        <el-switch v-model="model.has_lawn" size="small" active-text="Парковка"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_internet">
        <el-switch v-model="model.has_internet" size="small" active-text="Интернет"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_phone_line">
        <el-switch v-model="model.has_phone_line" size="small" active-text="Телефонная линия"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_garage">
        <el-switch v-model="model.has_garage" size="small" active-text="Гараж"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_basement">
        <el-switch v-model="model.has_basement" size="small" active-text="Подвал"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_attic">
        <el-switch v-model="model.has_attic" size="small" active-text="Чердак/мансарда"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_balcony">
        <el-switch v-model="model.has_balcony" size="small" active-text="Балкон"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_terrace">
        <el-switch v-model="model.has_terrace" size="small" active-text="Терраса"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_veranda">
        <el-switch v-model="model.has_veranda" size="small" active-text="Веранда"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_pool">
        <el-switch v-model="model.has_pool" size="small" active-text="Бассейн"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_sauna">
        <el-switch v-model="model.has_sauna" size="small" active-text="Сауна/баня"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_fireplace">
        <el-switch v-model="model.has_fireplace" size="small" active-text="Камин"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_fence">
        <el-switch v-model="model.has_fence" size="small" active-text="Ограждение"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_garden">
        <el-switch v-model="model.has_garden" size="small" active-text="Сад"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_vegetable_garden">
        <el-switch v-model="model.has_vegetable_garden" size="small" active-text="Огород"/>
      </el-form-item>
    </div>
    <div class="flex-1">
      <el-form-item prop="has_lawn">
        <el-switch v-model="model.has_lawn" size="small" active-text="Газон"/>
      </el-form-item>
    </div>
  </div>

  <div class="flex md:flex-row flex-col gap-4">
    <div class="flex-1">
      <el-form-item prop="has_playground">
        <el-switch v-model="model.has_playground" size="small" active-text="Детская площадка"/>
      </el-form-item>
    </div>
  </div>

</div>
</template>

<style scoped>

</style>
