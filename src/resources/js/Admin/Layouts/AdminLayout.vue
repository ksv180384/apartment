<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

import ApSidebar from "@/Admin/Layouts/ApSidebar.vue";
import ApHeader from '@/Admin/Layouts/ApHeader.vue';
import FlashMessages from '@/Components/FlashMessages.vue';

const props = defineProps({
  headerTitle: { type: String, default: '' },
});

const isMobile = ref(false);
const isMobileOpen = ref(false);

const toggleSidebar = () => {
  if (isMobile.value) {
    isMobileOpen.value = !isMobileOpen.value
  }
}

const handleResize = () => {
  const mobile = window.innerWidth < 768
  isMobile.value = mobile;
  if (!mobile) {
    isMobileOpen.value = false
  }
}

onMounted(() => {
  handleResize()
  window.addEventListener('resize', handleResize)
});

onUnmounted(() => {
  window.removeEventListener('resize', handleResize)
});
</script>

<template>

  <div
    class="min-h-screen flex"
    :class="[
      { 'overflow-hidden': isMobileOpen }
    ]"
  >

    <FlashMessages />

    <ApSidebar
      :isMobile="isMobile"
      :isMobileOpen="isMobileOpen"
    />
    <div
      class="flex flex-col w-full transition-all duration-300 ease-in-out md:ml-[290px]"
    >
      <ApHeader
        :header-title="headerTitle"
        :is-mobile="isMobile"
        :is-mobile-open="isMobileOpen"
        @toggle-mobile-menu="toggleSidebar"
      />
      <div
        class="flex flex-col flex-1 p-3 transition-all duration-300 max-w-(--breakpoint-2xl)"
        :class="[
          { 'w-screen ms-[290px]': isMobileOpen }
        ]"
      >
        <slot></slot>
      </div>
    </div>
  </div>

</template>

