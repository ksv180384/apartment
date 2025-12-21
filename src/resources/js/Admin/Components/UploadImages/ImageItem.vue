<script setup>
import { Delete } from '@element-plus/icons-vue';

const { index, image } = defineProps({
  index: { type: Number },
  image: { type: String }
});

const emits = defineEmits(['remove']);

const removeImg = () => {
  emits('remove', index);
}
</script>

<template>
  <div class="overflow-hidden w-40 h-fit rounded-sm relative group shadow-lg border border-gray-300">
    <el-button
      type="danger"
      class="opacity-0 group-hover:opacity-100 transition-opacity absolute top-1 right-1 z-10"
      :icon="Delete"
      size="small"
      circle
      plain
      @click="removeImg()"
    />
    <img :src="image" :alt="`Dog image ${index}`" class="" />
  </div>
</template>

<style scoped>

</style>

