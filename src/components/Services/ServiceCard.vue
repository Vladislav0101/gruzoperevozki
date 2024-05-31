<script setup>
import VTypography from '@/components/Common/VTypography.vue'
import VButton from '@/components/Common/VButton.vue'
</script>

<template>
  <div :class="$style.serviceCard">
    <div :class="$style.header">
      <VTypography :class="$style.title" size="s28" weight="bold">
        <slot name="title"></slot>
      </VTypography>

      <VButton>
        <VTypography size="sm" color="cultured">Заказать услугу</VTypography>
      </VButton>
    </div>

    <VTypography :class="$style.description"><slot name="description"></slot></VTypography>

    <div :class="$style.image">
      <slot name="image" />
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.serviceCard {
  display: grid;
  background-color: $color-cultured;
  border-radius: 10px;
  box-shadow: 0 0 12px 4px #f0f3f447;
  max-width: 500px;
  padding: 20px;
  transition: all 0.1s linear;

  &:hover {
    transform: scale(1.02);
    box-shadow: none;
  }

  .header {
    align-items: start;
    display: grid;
    gap: 40px;
    grid-template-columns: auto max-content;
    justify-content: space-between;
    margin-bottom: 10px;

    .title {
    }
  }

  .description {
    margin-bottom: 15px;
  }

  .image {
    img {
      border-radius: 3px;
      width: 100%;
    }
  }
}
</style>
