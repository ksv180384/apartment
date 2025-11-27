<script setup>
import { ref, onMounted, nextTick, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  propertyType: { type: Object, default: null },
  lastOrder: { type: Number, default: null },
  errors: { type: Object, default: {} }
});
const emits = defineEmits(['submit']);

const refForm = ref();
const refInputName = ref();
const form = useForm({
  name: props.propertyType?.name || '',
  slug: props.propertyType?.slug  || '',
  description: props.propertyType?.description  || '',
  order: props.propertyType?.order  || (props.lastOrder || ''),
  is_active: props.propertyType?.is_active  || true,
  meta_title: props.propertyType?.meta_title  || '',
  meta_description: props.propertyType?.meta_description  || '',
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
        <el-form-item label="Название" label-position="top" prop="name" required :error="errors?.name || null">
          <el-input ref="refInputName" v-model="form.name" placeholder="Название"/>
        </el-form-item>
      </div>
      <div class="flex-1">
        <el-form-item label="ЧПУ-ссылка" label-position="top" prop="slug" :error="errors?.slug || null">
          <el-input v-model="form.slug" placeholder="ЧПУ-ссылка"/>
        </el-form-item>
      </div>
    </div>

    <div>
      <el-form-item label="Описание" label-position="top" prop="description" :error="errors?.description || null">
        <el-input
          v-model="form.description"
          placeholder="Описание"
          type="textarea"
        />
      </el-form-item>
    </div>

    <div class="flex md:flex-row flex-col md:items-center items-start">
      <div class="flex-1">
        <el-form-item prop="slug" :error="errors?.is_active || null">
          <el-switch v-model="form.is_active" active-text="Виден ли тип недвижимости"/>
        </el-form-item>
      </div>
      <div class="flex-1 flex justify-end">
        <el-form-item label="Позиция в списке" label-position="top" prop="order" required :error="errors?.order || null">
          <el-input-number v-model="form.order" :min="0" />
        </el-form-item>
      </div>
    </div>

    <div>
      <el-form-item label="Название для поисковых систем" label-position="top" prop="meta_title" :error="errors?.meta_title || null">
        <el-input
          v-model="form.meta_title"
          placeholder="Название для поисковых систем"
        />
      </el-form-item>
    </div>

    <div>
      <el-form-item label="Описание для поисковых систем" label-position="top" prop="meta_description" :error="errors?.meta_description || null">
        <el-input
          v-model="form.meta_description"
          placeholder="Описание для поисковых систем"
          type="textarea"
        />
      </el-form-item>
    </div>

    <div>
      <el-button type="success" plain native-type="submit">Сохранить</el-button>
    </div>
  </div>
</el-form>
</template>

<style scoped>

</style>
