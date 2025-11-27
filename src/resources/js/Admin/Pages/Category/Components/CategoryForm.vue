<script setup>
import { ref, onMounted, nextTick, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  category: { type: Object, default: null },
  lastOrder: { type: Number, default: null },
  errors: { type: Object, default: {} }
});
const emits = defineEmits(['submit']);

const refForm = ref();
const refInputName = ref();
const form = useForm({
  name: props.category?.name || '',
  slug: props.category?.slug  || '',
  order: props.category?.order  || (props.lastOrder || ''),
  is_active: props.category?.is_active  || true,
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
        <el-form-item label="Название категории" label-position="top" prop="name" required :error="errors?.name || null">
          <el-input ref="refInputName" v-model="form.name" placeholder="Название категории"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="ЧПУ-ссылка" label-position="top" prop="slug" :error="errors?.slug || null">
          <el-input v-model="form.slug" placeholder="ЧПУ-ссылка"/>
        </el-form-item>
      </div>
    </div>

    <div class="flex md:flex-row flex-col md:items-center items-start">
      <div class="flex-1">
        <el-form-item prop="slug" :error="errors?.is_active || null">
          <el-switch v-model="form.is_active" active-text="Видна ли категория"/>
        </el-form-item>
      </div>
      <div class="flex-1 flex justify-end">
        <el-form-item label="Позиция категории в списке" label-position="top" prop="order" required :error="errors?.order || null">
          <el-input-number v-model="form.order" :min="0" />
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
