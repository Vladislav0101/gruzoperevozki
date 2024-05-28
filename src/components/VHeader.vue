<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue'

const header = ref()
const isSimplifiedHeader = ref(false)

const headerType = computed(() => ['defaultHeader', 'simplifiedHeader'][+isSimplifiedHeader.value])

const subscribeHeaderScroll = () => {
  const { scrollY } = window

  isSimplifiedHeader.value = scrollY > 0
}

// TODO: добавить подсвечивание текующего блока
// const headerObserver = ref()
// const observeHeader = () => {
//   headerObserver.value = new IntersectionObserver(
//     () => {
//       console.log('headerObserver')
//     },
//     {
//       root: document.querySelector('[data-target]'),
//       rootMargin: '60px',
//       threshold: 1.0
//     }
//   )

//   headerObserver.value.observe(header.value)
// }

onMounted(() => {
  addEventListener('scroll', subscribeHeaderScroll)
})

onUnmounted(() => {
  removeEventListener('scroll', subscribeHeaderScroll)
})
</script>

<template>
  <header :class="($style.header, $style[headerType])" ref="header">
    <div :class="[$style.container]">header {{ isSimplifiedHeader }}</div>
  </header>

  <div v-if="isSimplifiedHeader" :class="$style.headerCap"></div>
</template>

<style lang="scss" module>
@import url('@/assets/common.scss');
$simplified-header-height: 60px;

header {
  transition: all 0.4s linear;
  position: relative;
}

.headerCap {
  height: $simplified-header-height;
}

.defaultHeader {
  background-color: #34495e;
  height: 100px;
}

.simplifiedHeader {
  position: fixed;
  background-color: #273c52;
  height: $simplified-header-height;
  inset: 0;
  z-index: 999;
}
</style>
