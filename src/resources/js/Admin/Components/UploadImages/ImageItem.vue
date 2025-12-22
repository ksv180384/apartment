<script setup>
import { ref } from 'vue';
import { Delete } from '@element-plus/icons-vue';

const { index, image } = defineProps({
  index: { type: Number },
  image: { type: String },
  imageFull: { type: String },
});

const emits = defineEmits(['remove']);

const removeLoading = ref(false);

const removeImg = () => {
  removeLoading.value = true;
  emits('remove', index);
}
</script>

<template>

  <div class="overflow-hidden w-40 rounded-sm relative group shadow-lg border border-gray-300">
    <el-button
      type="danger"
      class="opacity-0 group-hover:opacity-100 transition-opacity !absolute top-1 right-1 z-1"
      :icon="Delete"
      size="small"
      circle
      plain
      :loading="removeLoading"
      @click="removeImg()"
    />
      <el-image
        class="overflow-hidden w-40 rounded-sm relative h-full"
        :src="image"
        :preview-teleported="image"
        :preview-src-list="[imageFull]"
        :zoom-rate="1.2"
        fit="cover"
        :z-index="3"
      />
  </div>
<!--  <div class="overflow-hidden w-40 h-fit rounded-sm relative group shadow-lg border border-gray-300">-->
<!--    <el-button-->
<!--      type="danger"-->
<!--      class="opacity-0 group-hover:opacity-100 transition-opacity !absolute top-1 right-1 z-10"-->
<!--      :icon="Delete"-->
<!--      size="small"-->
<!--      circle-->
<!--      plain-->
<!--      :loading="removeLoading"-->
<!--      @click="removeImg()"-->
<!--    />-->
<!--    <img :src="image" :alt="`Dog image ${index}`" class="" />-->
<!--  </div>-->
</template>

<style scoped>

</style>

