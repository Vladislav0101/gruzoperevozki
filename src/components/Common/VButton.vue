<script setup>
defineProps({
  color: {
    type: String,
    default: 'orange'
  },
  size: {
    type: String,
    default: 'medium'
  },
  animated: {
    type: Boolean,
    default: false
  }
})
</script>

<template>
  <div :class="$style.buttonBox">
    <button :class="[$style[color], $style[size]]"><slot /></button>
    <div :class="$style.shadowBox"></div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

@keyframes animationTo {
  from {
    inset: 0;
    box-shadow: 0 0 0 0 #f39c12;
  }
  to {
    inset: -4px;
    box-shadow: 0 0 5px 2px $color-orange;
  }
}

@keyframes animationFrom {
  from {
    inset: -4px;
    box-shadow: 0 0 5px 2px $color-orange;
    inset: 0;
    box-shadow: 0 0 0 0 #f39c12;
  }
  to {
    inset: 0;
    box-shadow: 0 0 0 0 #f39c12;
  }
}

.buttonBox {
  position: relative;
}

button {
  cursor: pointer;
  outline: none;
  position: relative;
  z-index: 1;
}

button:hover + .shadowBox {
  animation: unset;
}

.shadowBox {
  animation: animationTo 0.6s ease-in-out infinite alternate;
  background-color: $color-orange;
  border-radius: 4px;
  position: absolute;
  // inset: 0;
  transition: all 1s linear;
  opacity: 0.4;
}

// sizes
.medium {
  border-radius: 4px;
  padding: 5px 10px;
}

// background-colors
.wetAsphalt {
  background-color: $color-wet-asphalt;
}

.cultured {
  background-color: $color-cultured;
}

.orange {
  background-color: $color-orange;
}
</style>
