<script setup>
defineProps({
  mode: {
    type: String,
    default: 'main'
  },
  isSubmitButton: {
    type: Boolean,
    default: false
  },
  animated: {
    type: Boolean,
    default: false
  }
})
</script>

<template>
  <div :class="$style.buttonBox">
    <button :type="isSubmitButton ? 'submit' : 'button'" :class="[$style[mode]]"><slot /></button>
    <div :class="[$style.shadowBox, animated && $style.animated]"></div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

@keyframes mainAnimation {
  from {
    inset: 0;
    box-shadow: 0 0 0 0 #f39c12;
  }
  to {
    inset: -4px;
    box-shadow: 0 0 5px 2px $color-orange;
  }
}

@keyframes emptyAnimation {
  from {
    inset: 0;
    box-shadow: 0 0 0 0 $color-orange;
  }
  to {
    inset: 0;
    box-shadow: 0 0 15px 8px $color-orange;
  }
}

.buttonBox {
  position: relative;
  width: max-content;
}

button {
  cursor: pointer;
  outline: none;
  position: relative;
  z-index: 1;
  width: 100%;

  &:hover {
    text-decoration: underline;
  }
}

button:hover + .shadowBox {
  animation: unset;
}

.shadowBox {
  background-color: $color-orange;
  border-radius: 4px;
  position: absolute;
  transition: all 1s linear;
  opacity: 0.4;
}

.main {
  background-color: $color-orange;
  color: $color-cultured;
  padding: 10px 20px;
  font-weight: 500;

  @media screen and (max-width: 950px) {
    padding: 8px 16px;
  }
}

.main + .animated {
  animation: mainAnimation 0.6s ease-in-out infinite alternate;
}

.empty {
  padding: 10px 20px;
  background-color: unset;
  border: 1px solid $color-orange;
  color: $color-cultured;
  transition: all 0.1s linear;

  &:hover {
    text-decoration: underline;
  }

  @media screen and (max-width: 950px) {
    padding: 8px 16px;
  }

  @media screen and (max-width: 768px) {
    padding: 6px 12px;
  }
}
</style>
