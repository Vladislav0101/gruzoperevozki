<script setup>
import VTypography from '@/components/Common/VTypography.vue'
import VButton from '@/components/Common/VButton.vue'
</script>

<template>
  <div :class="$style.serviceCard">
    <div :class="$style.header">
      <VTypography :class="$style.title" color="cultured" size="s28" weight="bold">
        <slot name="title" />
      </VTypography>

      <VButton>
        <VTypography size="sm" color="cultured">Заказать услугу</VTypography>
      </VButton>
    </div>

    <VTypography :class="$style.description" color="cultured">
      <slot name="description" />
    </VTypography>

    <div :class="$style.price">
      <VTypography color="orange" weight="bold">Стоимость:</VTypography>
      <VTypography color="cultured" size="sm" weight="bold"><slot name="price" /></VTypography>
    </div>

    <div :class="$style.image">
      <slot name="image" />
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.serviceCard {
  display: grid;
  background-color: $color-wet-asphalt;
  max-width: 500px;
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
    padding: 30px 30px 15px 30px;
    justify-content: space-between;
  }

  .description {
    padding: 0 30px 15px 30px;
  }

  .price {
    align-items: center;
    display: flex;
    gap: 10px;
    padding: 0 30px 20px 30px;
  }

  .image {
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
}
</style>
