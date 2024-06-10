<script setup>
import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
</script>

<template>
  <VTypography size="xxs" color="orange">
    Стоимость уточняйте по <u @click="scrollTo('contacts')">телефону</u>
  </VTypography>
</template>
