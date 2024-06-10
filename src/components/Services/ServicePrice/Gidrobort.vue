<script setup>
import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
</script>

<template>
  <VTypography size="xxs" color="orange">
    <u @click="scrollTo('contacts')">Стоимость</u>
  </VTypography>
</template>

<style lang="scss" module>
u {
  cursor: pointer;
}
</style>
