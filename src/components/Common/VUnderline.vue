<script setup>
defineProps({
  centering: {
    type: String,
    default: 'center'
  }
})
</script>

<template>
  <div :class="[$style.line, $style[centering]]"></div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

$commonLineGap: 30px;

.line {
  background-color: $color-orange;
  height: 5px;
  position: relative;
  width: calc(100% + $commonLineGap);

  @media screen and (max-width: $desktop-point) {
    height: 3px;
  }
}

.center {
  right: calc($commonLineGap / 2 - 3px);
}

.left {
  right: 0;
}

.right {
  right: $commonLineGap;
}
</style>
