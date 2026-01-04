<script setup>
import { Head } from '@inertiajs/vue3';

import AppHeader from '@/App/Components/AppHeader.vue';
import AppFooter from '@/App/Components/AppFooter.vue';

const { seo } = defineProps({
  seo: {
    type: Object,
    default: () => ({
      title: '',
      description: '',
      keywords: '',
      canonical: '',
    })
  }
});
</script>

<template>
<div>
  <Head>
    <title>{{ seo.title }}</title>
    <meta name="description" :content="seo.description" />
    <meta name="keywords" :content="seo.keywords" />
    <link rel="canonical" :href="$page.url" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" :content="$page.url" />
    <meta property="og:title" :content="seo.title" />
    <meta property="og:description" :content="seo.description" />
    <meta property="og:image" content="/images/og_logo.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" :content="$page.url" />
    <meta property="twitter:title" :content="seo.title" />
    <meta property="twitter:description" :content="seo.description" />
    <meta property="twitter:image" content="/images/og_logo.jpg" />
  </Head>

  <AppHeader>
    <template #right>
      <slot name="headerRight"></slot>
    </template>
  </AppHeader>
  <!-- Main Content -->
  <main class="container mx-auto lg:px-4 py-6 flex gap-6 pt-19 lg:pt-24 flex-col lg:flex-row">

    <slot></slot>

  </main>

  <!-- Footer -->
  <AppFooter/>
</div>
</template>

<style scoped>

</style>
