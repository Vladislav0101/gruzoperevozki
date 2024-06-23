<script setup>
import VTypography from '@/components/Common/VTypography.vue'
</script>

<template>
  <div :class="$style.advantageCard">
    <div :class="$style.corner" />
    <div :class="$style.content">
      <VTypography weight="bold" size="s50" color="orange" class="">
        <slot name="number" />
      </VTypography>
      <VTypography weight="bold" size="xl"><slot name="title" /></VTypography>
      <VTypography><slot name="description" /></VTypography>
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.advantageCard {
  background-color: $color-light-grey;
  position: relative;

  .corner {
    border-left: 10px solid $color-orange;
    border-top: 10px solid $color-orange;
    height: 40px;
    left: -20px;
    position: absolute;
    top: -20px;
    width: 40px;
  }

  .content {
    display: grid;
    gap: 10px;
    padding: 30px 20px;
  }
}

@media screen and (max-width: $desktop-point) {
  .advantageCard {
    .corner {
      border-width: 8px;
      left: -15px;
      top: -15px;
    }

    .content {
      gap: 5px;
      padding: 15px;
    }
  }
}

@media screen and (max-width: 980px) {
  .advantageCard {
    .content {
      p:nth-child(1) {
        font-size: 44px;
      }

      p:nth-child(2) {
        font-size: 20px;
      }

      p:nth-child(3) {
        font-size: 14px;
      }
    }
  }
}

@media screen and (max-width: 600px) {
  .advantageCard {
    .corner {
      border-width: 6px;
      left: -12px;
      top: -12px;
    }

    .content {
      gap: 0;
      padding: 10px;

      p:nth-child(1) {
        font-size: 36px;
      }

      p:nth-child(2) {
        font-size: 18px;
        margin-bottom: 5px;
      }

      p:nth-child(3) {
        font-size: 14px;
      }
    }
  }
}
</style>
