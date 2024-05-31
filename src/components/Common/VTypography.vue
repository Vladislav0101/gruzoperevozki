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
  font: {
    type: String,
    default: 'ptSans'
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
  <component
    :class="[$style.text, $style[size], $style[font], $style[color], $style[weight]]"
    :is="props.tag"
  >
    <slot />
  </component>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

// sizes
.xs {
  font-size: 12px;
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
}

.xxl {
  font-size: 32px;
}

.xxxl {
  font-size: 38px;
}

.large {
  font-size: 48px;
}

// fonts
.merriweather {
  font-family: 'Merriweather', serif;
}

.ptSans {
  font-family: 'PT Sans', sans-serif;
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
.regular {
  font-weight: 400;
}

.bold {
  font-weight: 700;
}

.black {
  font-weight: 900;
}
</style>
