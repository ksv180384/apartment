<script setup>
import { Link } from '@inertiajs/vue3';
import { More } from '@element-plus/icons-vue';

const { property } = defineProps({
  property: {type: Object, required: true},
});
const emits = defineEmits(['remove']);

const deleteItem = (id) => {
  emits('remove', id)
}

</script>

<template>
  <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow w-[300px]">
    <div class="relative">
      <img :src="property.image_main" :alt="property.title" class="w-full h-48 object-cover">
      <div class="absolute top-2 left-2 bg-white px-2 py-1 rounded-full text-xs font-medium">{{ property.category }}</div>
      <div class="absolute text-xs top-2 right-2 flex gap-3">
        <button class=" p-2 bg-white rounded-full">
          #{{ property.id }}
        </button>
        <el-dropdown placement="bottom" trigger="click" :hide-on-click="false">
          <el-button :icon="More" circle/>
          <template #dropdown>
            <el-dropdown-menu>
              <el-dropdown-item>
                <el-popconfirm
                  confirm-button-text="Да"
                  cancel-button-text="Нет"
                  confirm-button-type="danger"
                  hide-icon
                  title="Удалить?"
                  @confirm="deleteItem(property.id)"
                >
                  <template #reference>
                    Удалить
                  </template>
                </el-popconfirm>
              </el-dropdown-item>
            </el-dropdown-menu>
          </template>
        </el-dropdown>
      </div>
    </div>
    <div class="p-4">
      <h3 class="font-semibold mb-1">
        <Link
          :href="route('admin.properties.edit', { id: property.id })"
          :key="property.id"
        >
          {{ property.title }}
        </Link>
      </h3>
      <div class="flex items-center text-sm text-gray-600 mb-2">
        <i class="fas fa-star text-yellow-500 mr-1"></i>
        <span>{{ property.property_type }}</span>
      </div>
      <p class="text-sm text-gray-700 mb-2 line-clamp-2 truncate-start" :title="property.address">
        {{ property.address }}
      </p>
      <p class="text-sm text-gray-500 mb-2">Добавил(а): {{ property.user }}</p>
      <div class="flex items-center justify-between">
        <span class="text-sm text-gray-500 line-through"></span>
        <span class="text-lg font-semibold text-red-600">
          {{ property.price }}
          <template v-if="property.property_slug === 'ucastki'">
            сотка
          </template>
          <template v-else>
            м²
          </template>
        </span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.truncate-start {
  direction: rtl;
  text-align: left;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.truncate-start > * {
  direction: ltr;
  display: inline-block;
}
</style>
