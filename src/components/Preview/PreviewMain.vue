<script setup>
import VTypography from '@/components/Common/VTypography.vue'
</script>

<template>
  <div :class="[$style.container, $style.preview]">
    <div :class="$style.title">
      <VTypography color="orange" size="large"> Мы знаем, как важен ваш груз: </VTypography>
      <VTypography color="cultured" size="xxl">
        грузоперевозки, которым можно доверять
      </VTypography>
    </div>
  </div>
</template>

<style lang="scss" module>
@import url('@/assets/common.scss');

.preview {
  align-items: center;
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 50vh;

  .title {
    display: grid;
    gap: 20px;
  }
}
</style>
