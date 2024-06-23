<script lang="ts" setup>
const props = defineProps({
  tag: {
    type: String,
    default: 'p'
  },
  size: {
    type: String,
    default: 'm'
  },
  color: {
    type: String,
    default: 'wetAsphalt'
  },
  weight: {
    type: String,
    default: 'regular'
  }
})
</script>

<template>
  <component :class="[$style.text, $style[size], $style[color], $style[weight]]" :is="props.tag">
    <slot />
  </component>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

$tablet-font-ratio: 1;

@media screen and (max-width: 1280px) {
  $tablet-font-ratio: calc($tablet-point / $desktop-point);
}

// sizes
.xs {
  font-size: 12px;
}

.xxs {
  font-size: 14px;
}

.m {
  font-size: 16px;
}

.sm {
  font-size: 18px;
}

.l {
  font-size: 20px;
}

.xl {
  font-size: 24px;
}

.s28 {
  font-size: 28px;

  @media screen and (max-width: $tablet-point) {
    font-size: 12px;
  }
}

.xxl {
  font-size: 32px;
}

.xxxl {
  font-size: 38px;
}

.s40 {
  font-size: 40px;
}

.large {
  font-size: 48px;
}

.s50 {
  font-size: 50px;
}

.headline {
  font-size: 60px;

  @media screen and (max-width: $tablet-point) {
    font-size: 32px;
  }
}

// colors
.wetAsphalt {
  color: $color-wet-asphalt;
}

.cultured {
  color: $color-cultured;
}

.orange {
  color: $color-orange;
}

// font-weights
.thin {
  font-weight: 100;
}

.extraLight {
  font-weight: 200;
}

.light {
  font-weight: 300;
}

.regular {
  font-weight: 400;
}

.medium {
  font-weight: 500;
}

.semiBold {
  font-weight: 600;
}

.bold {
  font-weight: 700;
}

.black {
  font-weight: 900;
}
</style>
