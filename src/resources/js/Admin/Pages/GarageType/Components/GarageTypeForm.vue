<script setup>
import { ref, onMounted, nextTick, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  garageType: { type: Object, default: null },
  errors: { type: Object, default: {} }
});
const emits = defineEmits(['submit']);

const refForm = ref();
const refInputName = ref();
const form = useForm({
  name: props.garageType?.name || '',
  slug: props.garageType?.slug  || '',
});

const rules = reactive({});

const submit = async () => {

  const isFormValid = await refForm.value.validate((valid) => valid);

  if(!isFormValid){
    return true;
  }

  emits('submit', form);
}

onMounted(() => {
  nextTick(() => {
    refInputName.value.focus();
  });
});
</script>

<template>
<el-form
  ref="refForm"
  :model="form"
  :rules="rules"
  @submit.prevent="submit"
>
  <div class="flex flex-col">
    <div class="flex md:flex-row flex-col gap-4">
      <div class="flex-1">
        <el-form-item label="Название типа гаража" label-position="top" prop="name" required :error="errors?.name || null">
          <el-input ref="refInputName" v-model="form.name" placeholder="Название типа гаража"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="ЧПУ-ссылка" label-position="top" prop="slug" :error="errors?.slug || null">
          <el-input v-model="form.slug" placeholder="ЧПУ-ссылка"/>
        </el-form-item>
      </div>
    </div>

    <div>
      <el-button type="success" plain native-type="submit">Сохранить</el-button>
    </div>
  </div>
</el-form>
</template>

<style scoped>

</style>
